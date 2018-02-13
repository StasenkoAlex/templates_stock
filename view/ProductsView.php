<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simplacms.ru
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблон products.tpl
 *
 */
 
require_once('View.php');

class ProductsView extends View
{
 	/**
	 *
	 * Отображение списка товаров
	 *
	 */	
	function fetch()
	{
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');
		$brand_url    = $this->request->get('brand', 'string');
		
		$filter = array();
		$filter['visible'] = 1;	

    /* MultiFilter  */
		// Если задан бренд, выберем его из базы
    if ($val = $this->request->get('b'))
      $filter['brand_id'] = $val;
      elseif (!empty($brand_url)) {
        $brand = $this->brands->get_brand((string) $brand_url);
        if (empty($brand))
          return false;
        $this->design->assign('brand', $brand);
        $filter['brand_id'] = $brand->id;
      }
		
		$prices = array();
        $prices['current'] = $this->request->get('p');
        if (!empty($prices['current']['min']) && !empty($prices['current']['max']))
            $filter['price'] = $prices['current'];
        else
            unset($prices['current']);
        
        // Если задан вариант
		$variant = $this->request->get('v');
		if (!empty($variant))
			$filter['variant'] = $variant;
    /*/ MultiFilter  */
		
		// Выберем текущую категорию
		if (!empty($category_url))
		{
			$category = $this->categories->get_category((string)$category_url);
			if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
				return false;
			$this->design->assign('category', $category);
			$filter['category_id'] = $category->children;
		}

		// Если задано ключевое слово
		$keyword = $this->request->get('keyword');
		if (!empty($keyword))
		{
			$this->design->assign('keyword', $keyword);
			$filter['keyword'] = $keyword;
		}

		// Сортировка товаров, сохраняем в сесси, чтобы текущая сортировка оставалась для всего сайта
		if($sort = $this->request->get('sort', 'string'))
			$_SESSION['sort'] = $sort;		
		if (!empty($_SESSION['sort']))
			$filter['sort'] = $_SESSION['sort'];			
		else
			$filter['sort'] = 'position';			
		$this->design->assign('sort', $filter['sort']);
		
		// Свойства товаров
		if(!empty($category))
		{
			$features = array();
			foreach($this->features->get_features(array('category_id'=>$category->id, 'in_filter'=>1)) as $feature)
			{ 
				$features[$feature->id] = $feature;
				/* MultiFilter  */
				if($val = $this->request->get($feature->id))
					$filter['features'][$feature->id] = $val;	
				/*/ MultiFilter  */
			}
			
			$options_filter['visible'] = 1;
			
			$features_ids = array_keys($features);
			if(!empty($features_ids))
				$options_filter['feature_id'] = $features_ids;
			$options_filter['category_id'] = $category->children;
			if(isset($filter['features']))
				$options_filter['features'] = $filter['features'];
			if(!empty($brand))
				$options_filter['brand_id'] = $brand->id;
			
			$options = $this->features->get_options($options_filter);

			foreach($options as $option)
			{
				if(isset($features[$option->feature_id]))
					$features[$option->feature_id]->options[] = $option;
			}
			
			foreach($features as $i=>&$feature)
			{ 
				if(empty($feature->options))
					unset($features[$i]);
			}

			$this->design->assign('features', $features);
 		}

		// Постраничная навигация
		$items_per_page = $this->settings->products_num;		
		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'integer');
		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);
		// Вычисляем количество страниц
		$products_count = $this->products->count_products($filter);
		
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $products_count;	
		
		$pages_num = ceil($products_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);
		$this->design->assign('total_products_num', $products_count);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		
		///////////////////////////////////////////////
		// Постраничная навигация END
		///////////////////////////////////////////////
		

		$discount = 0;
		if(isset($_SESSION['user_id']) && $user = $this->users->get_user(intval($_SESSION['user_id'])))
			$discount = $user->discount;
			
		// Товары 
		$products = array();
		foreach($this->products->get_products($filter) as $p)
			$products[$p->id] = $p;
			
		// Если искали товар и найден ровно один - перенаправляем на него
		if(!empty($keyword) && $products_count == 1)
			header('Location: '.$this->config->root_url.'/products/'.$p->url);
		
		if(!empty($products))
		{
			$products_ids = array_keys($products);
			foreach($products as &$product)
			{
				$product->variants = array();
				$product->images = array();
				$product->properties = array();
			}
	
			$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
			
			foreach($variants as &$variant)
			{
				//$variant->price *= (100-$discount)/100;
				$products[$variant->product_id]->variants[] = $variant;
			}
       
      /* MultiFilter  */
			if(!empty($category) || !empty($brand)) {
        $variant_products = array();
        foreach($this->products->get_id_products($filter) as $p)
        	$variant_products[$p->id] = $p;
        $variant_products_ids = array_keys($variant_products);

        $features_variants = array();
        $temp_variants = $this->variants->get_value_variants(array('product_id'=>$variant_products_ids, 'in_stock'=>true));
        foreach($temp_variants as &$variant)
        	$features_variants[$variant->name] = $variant->name;  
        asort($features_variants);
        $this->design->assign('features_variants', $features_variants);

        $variant_products = array();
        unset($filter['price']);
        $range_filter_id = $this->products->get_id_products($filter);
        foreach($range_filter_id as $_range_filter_id)
        	$range_filter['id'][] = $_range_filter_id->id;
        $range_filter['limit'] = $this->products->count_products($range_filter);
        foreach ($this->products->get_products($range_filter) as $p)
        	$variant_products[$p->id] = $p;

        $prices_range = $this->variants->prices_range(array('product_id' => array_keys($variant_products), 'instock' => true), 1);
        if ($prices_range->max > $prices_range->min) {
        	$prices_range->current->min = empty($prices['current']['min']) ? $prices_range->min : $prices['current']['min'];
        	$prices_range->current->max = empty($prices['current']['max']) ? $prices_range->max : $prices['current']['max'];
        	$this->design->assign('prices_range', $prices_range);
        }
      }
      /*/ MultiFilter  */


	
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;

			foreach($products as &$product)
			{
				if(isset($product->variants[0]))
					$product->variant = $product->variants[0];
				if(isset($product->images[0]))
					$product->image = $product->images[0];
			}
				
	
			/*
			$properties = $this->features->get_options(array('product_id'=>$products_ids));
			foreach($properties as $property)
				$products[$property->product_id]->options[] = $property;
			*/
	
			$this->design->assign('products', $products);
 		}
		
		// Выбираем бренды, они нужны нам в шаблоне	
		if(!empty($category))
		{
			$brands = $this->brands->get_brands(array('category_id'=>$category->children, 'visible'=>1));
			$category->brands = $brands;		
		}
		
		// Устанавливаем мета-теги в зависимости от запроса
		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}
		elseif(isset($category))
		{
			$this->design->assign('meta_title', $category->meta_title);
			$this->design->assign('meta_keywords', $category->meta_keywords);
			$this->design->assign('meta_description', $category->meta_description);
		}
		elseif(isset($brand))
		{
			$this->design->assign('meta_title', $brand->meta_title);
			$this->design->assign('meta_keywords', $brand->meta_keywords);
			$this->design->assign('meta_description', $brand->meta_description);
		}
		elseif(isset($keyword))
		{
			$this->design->assign('meta_title', $keyword);
		}
		
			
		$this->body = $this->design->fetch('products.tpl');
		return $this->body;
	}
	
	

}
