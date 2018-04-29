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
    /* chpu_filter */
    private $meta_array = array();
    private $set_canonical = false;
    private $set_noindex = false;
    private $meta = array('h1'=>'','title'=>'','keywords'=>'','description'=>'');
    private $meta_delimiter = '. ';

    public function __construct()
    {
        parent::__construct();

        /**
         *
         * внешний вид параметров:
         * brand=brandUrl1_brandUrl2... - фильтр по брендам
         * paramUrl=paramValue1_paramValue2... - фильтр по мультисвойствам
         * page=pageNumber - постраничная навигация
         * sort=sortParam - параметры сортировки
         *
         */

        //определение текущего положения и выставленных параметров
        $uri = @parse_url($_SERVER["REQUEST_URI"]);
        //убираем модификатор каталога
        $uri = preg_replace("~/?catalog/~",'',$uri['path']);
        $uri_array = explode('/',$uri);
        array_shift($uri_array);
        foreach($uri_array as $k=>$v){
            if(empty($v)) continue;
            if(!$k && $brand=$this->brands->get_brand((string)$v)){
                $_GET['brand'] = $brand->url;
            }else{
                list($param_name, $param_values) = explode('=',$v);
                switch($param_name){
                    case 'brand':
                        foreach(explode('_',$param_values) as $bv)
                            if($brand = $this->brands->get_brand((string)$bv)){
                                $_GET['b'][] = $brand->id;
                                $this->set_noindex = true;
                            }
                        break;
                    case 'price-min':
                        $_GET['p']['min'] = $this->chpu_deconvert($param_values);
                        $this->set_noindex = true;
                        break;
                    case 'price-max':
                        $_GET['p']['max'] = $this->chpu_deconvert($param_values);
                        $this->set_noindex = true;
                        break;
                    case 'page':
                        $_GET['page'] = $param_values;
                        $this->set_noindex = true;
                        break;
                    case 'sort':
                        $_GET['sort'] = strval($param_values);
                        $this->set_noindex = true;
                        break;
                    default:
                        if($feature = $this->features->get_feature($param_name)){
                            $_GET[$feature->id] = (array)explode('_',$param_values);
                            if($feature->is_index)
                                $this->set_canonical = true;
                            if(count($_GET[$feature->id]) > 1){
                                $this->set_noindex = true;
                            }
                            foreach($this->features->get_options(array('feature_id'=>$feature->id,'features'=>array($feature->id=>$_GET[$feature->id]))) as $fo){
                                if(in_array($fo->translit,$_GET[$feature->id])){
                                    $this->meta_array[$feature->id][] = $feature->name . '-'. $fo->value;
                                }
                            }
                        }
                }
            }
        }


        // Проверяем наличие массива свойств
        if(!empty($this->meta_array)){
            // Если свойство в единственном экземпляре и у него есть галочка индексации
            if(count($this->meta_array) == 1 && $this->set_canonical && !$this->set_noindex){
                $f_array = reset($this->meta_array);
                $this->meta['h1']           .= (!empty($this->meta['h1'])           ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                $this->meta['title']        .= (!empty($this->meta['title'])        ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                $this->meta['keywords']     .= (!empty($this->meta['keywords'])     ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                $this->meta['description']  .= (!empty($this->meta['description'])  ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
            }else{
                $this->set_noindex = true;
                foreach($this->meta_array as $f_id=>$f_array){
                    $this->meta['h1']           .= (!empty($this->meta['h1'])           ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                    $this->meta['title']        .= (!empty($this->meta['title'])        ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                    $this->meta['keywords']     .= (!empty($this->meta['keywords'])     ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                    $this->meta['description']  .= (!empty($this->meta['description'])  ? $this->meta_delimiter : '') . implode($this->meta_delimiter,$f_array);
                }

            }

        }


        $this->design->assign('set_canonical',$this->set_canonical);
        $this->design->assign('set_noindex',$this->set_noindex);
        $this->design->assign('filter_meta',(object)$this->meta);
        $this->design->assign('current_chpu_url', $this->filter_chpu_url());

        $this->design->smarty->registerPlugin('function', 'furl', array($this, 'filter_chpu_url'));
        $this->design->smarty->registerPlugin('modifier', 'fconvert', array($this, 'chpu_convert'));

    }
    public function filter_chpu_url($params = array())
    {
        if(!empty($params) && is_array(reset($params)))
            $params = reset($params);

        $result_array = array('brand'=>array(),'features'=>array(),'sort'=>null,'page'=>null);
        //Определяем, что у нас уже есть в строке
        $uri = @parse_url($_SERVER["REQUEST_URI"]);
        $uri = preg_replace("~/?catalog/~",'',$uri['path']);
        $uri_array = explode('/',$uri);
        array_shift($uri_array);
        foreach($uri_array as $k=>$v){
            if($k>0 || !($brand=$this->brands->get_brand((string)$v))){
                list($param_name, $param_values) = explode('=',$v);
                switch($param_name){
                    case 'brand':
                        $result_array['brand'] = explode('_',$param_values);
                        break;
                    case 'price-min':
                        $result_array['price-min'] = $param_values;
                        break;
                    case 'price-max':
                        $result_array['price-max'] = $param_values;
                        break;
                    case 'sort':
                        $result_array['sort'] = strval($param_values);
                        break;
                    case 'page':
                        $result_array['page'] = $param_values;
                        break;
                    default:
                        $result_array['features'][$param_name] = explode('_',$param_values);
                }
            }
        }
        //Определяем переданные параметры для ссылки
        foreach($params as $k=>$v){
            switch($k){
                case 'brand':
                    if(is_null($v))
                        unset($result_array['brand']);
                    elseif(in_array($v,$result_array['brand']))
                        unset($result_array['brand'][array_search($v,$result_array['brand'])]);
                    else
                        $result_array['brand'][] = $v;
                    break;
                case 'price-min':
                    $result_array['price-min'] = $v;
                    break;
                case 'price-max':
                    $result_array['price-max'] = $v;
                    break;
                case 'sort':
                    $result_array['sort'] = strval($v);
                    break;
                case 'page':
                    $result_array['page'] = $v;
                    break;
                default:
                    if(is_null($v))
                        unset($result_array['features'][$k]);
                    elseif(!empty($result_array['features']) && in_array($k,array_keys($result_array['features'])) && in_array($v,$result_array['features'][$k]))
                        unset($result_array['features'][$k][array_search($v,$result_array['features'][$k])]);
                    else
                        $result_array['features'][$k][] = $v;
                    break;
            }
        }
        //формируем ссылку
        $result_string = '/catalog';
        if(!empty($_GET['category']))
            $result_string .= '/' . $_GET['category'];
        if(!empty($_GET['brand']))
            $result_string .= '/' . $_GET['brand'];

        if(!empty($result_array['brand']))
            $result_string .= '/brand=' . implode('_',$this->filter_chpu_sort_brands($result_array['brand'])); // - это с сортировкой по брендам
        //$result_string .= '/brand=' . implode('_',$result_array['brand']); // - это без сортировки по брендам
        foreach($result_array['features'] as $k=>$v){
            if(empty($result_array['features'][$k]))
                unset($result_array['features'][$k]);
        }
        if(!empty($result_array['features']))
            $result_string .= $this->filter_chpu_sort_features($result_array['features']);
        if(!empty($result_array['price-min']))
            $result_string .= '/price-min=' . $result_array['price-min'];
        if(!empty($result_array['price-max']))
            $result_string .= '/price-max=' . $result_array['price-max'];
        if(!empty($result_array['sort']))
            $result_string .= '/sort=' . $result_array['sort'];
        if($result_array['page'] > 1 || $result_array['page'] == 'all')
            $result_string .= '/page=' . $result_array['page'];
        //отдаем сформированную ссылку
        return $result_string;
    }
    private function filter_chpu_sort_brands($brands_urls = array()){
        if(empty($brands_urls))
            return false;
        $this->db->query("SELECT url FROM __brands WHERE url in(?@) ORDER BY name", (array)$brands_urls);
        return $this->db->results('url');
    }
    private function filter_chpu_sort_features($features = array()){
        if(empty($features))
            return false;
        $this->db->query("SELECT url FROM __features WHERE url in(?@) ORDER BY position", (array)array_keys($features));
        $result_string = '';
        foreach($this->db->results('url') as $v){
            if(in_array($v,array_keys($features))){
                $result_string .= '/' . $v . '=' . implode('_',$features[$v]);
            }
        }
        return $result_string;
    }
    // В случае с переключением валют нужно выполнять махинации с ценой
    public function chpu_convert($price){
        $currency = $this->currency;
        $result = $price;
        if(!empty($currency)){
            // Умножим на курс валюты
            $result = $result*$currency->rate_from/$currency->rate_to;
            // Точность отображения, знаков после запятой
            $precision = isset($currency->cents)?$currency->cents:2;
        }
        return round($result, $precision);
    }
    private function chpu_deconvert($price){
        $currency = $this->currency;
        $main_currency = current($this->money->get_currencies());
        $result = $price;
        if(!empty($currency)){
            // Умножим на курс валюты
            $result = $result*$currency->rate_to/$currency->rate_from;
            // Точность отображения, знаков после запятой
            $precision = isset($main_currency->cents)?$main_currency->cents:2;
        }
        return round($result, $precision);
    }
    /* chpu_filter /*/

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

		// Если задан бренд, выберем его из базы
        /* chpu_filter */
        $prices = array();
        $prices['current'] = $this->request->get('p');
        if (!empty($prices['current']['min']) || !empty($prices['current']['max']))
            $filter['price'] = $prices['current'];
        else
            unset($prices['current']);

        if ($val = $this->request->get('b'))
            $filter['brand_id'] = $val;
        else/* chpu_filter /*/if (!empty($brand_url))
		{
			$brand = $this->brands->get_brand((string)$brand_url);
			if (empty($brand))
				return false;
			$this->design->assign('brand', $brand);
			$filter['brand_id'] = $brand->id;
		}
		
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
                /* chpu_filter_extended */
                /*if(($val = strval($this->request->get($feature->id)))!='')*/
                if($val = $this->request->get($feature->id))
                /* chpu_filter_extended /*/
					$filter['features'][$feature->id] = $val;
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
            /* chpu_filter_extended */
            elseif(isset($filter['brand_id']))
                $options_filter['brand_id'] = $filter['brand_id'];
            /* chpu_filter_extended /*/
			
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
        /* chpu_filter */
        if(isset($prices['current']))
            $prices['current'] = (object)$prices['current'];
        $prices = (object)$prices;
        $range_filter = $filter;
        $range_filter['get_price'] = 1;
        $prices->range = $this->products->count_products($range_filter);
        $this->design->assign('prices', $prices);

        if($this->request->get('ajax_filter','boolean')){
            $response = new StdClass;
            $response->products = $this->design->fetch('chpu_products.tpl');
            $response->pagination = $this->design->fetch('chpu_pagination.tpl');
            $response->filter = $this->design->fetch('chpu_filter.tpl');
            print json_encode($response);
            die;
        }
        /* chpu_filter /*/
		
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
