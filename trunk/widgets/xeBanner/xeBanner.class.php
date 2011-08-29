<?php
    /**
     * @class xe_news
     * @author zero (zero@nzeo.com)
     * @brief XE공식사이트의 배너 위젯
     * @version 0.1
     **/

    class xeBanner extends WidgetHandler {

        /**
         * @brief 위젯의 실행 부분
         *
         * ./widgets/위젯/conf/info.xml 에 선언한 extra_vars를 args로 받는다
         * 결과를 만든후 print가 아니라 return 해주어야 한다
         **/
        function proc($args) {
            //number of the image
            $imageNo = 5;

            // 위젯 변수 설정
            for($i=1;$i<=$imageNo;$i++){
            	//title
            	$bKey = 'banner_title_'.$i;
            	$widget_info->info[$i]['title'] = $args->$bKey;

            	//descirption
            	$bKey = 'banner_description_'.$i;
            	$widget_info->info[$i]['descirption'] = $args->$bKey;

            	//url
            	$bKey = 'banner_url_'.$i;
            	$widget_info->info[$i]['url'] = $args->$bKey;
            	if(!$widget_info->info[$i]['url']) {
            		$widget_info->info[$i]['url'] = '#';
            	}
            	else if(!preg_match('/^http/i',$widget_info->info[$i]['url'])){
            		$widget_info->info[$i]['url'] = 'http://'.$widget_info->info[$i]['url'];
            	}

            	//image
            	$key = 'banner_'.$i;
            	if(empty($args->$key)){
            		$widget_info->info[$i]['image'] = '';
            		continue;
            	}
            	$widget_info->info[$i]['image'] = $args->$key;
            }

            Context::set('widget_info', $widget_info);

//            // 배너 이미지를 header에 추가
//        	$style = '<style type="text/css">';
//            foreach($widget_info->info as $key => $row){
//            	if(empty($row['image'])){
//            		continue;
//            	}
//            	$style .= '
//            				.xeBanner .section'.@$key.' { background:url('.@$row['image'].') no-repeat;}';
//            }
//            $style .= '
//            			</style>';
//            Context::addHtmlHeader($style);


            // 1~3중 순서대로 처리
            if(!$_COOKIE['xb']) $_COOKIE['xb']=0;
            $_COOKIE['xb']++;
            setcookie('xb',$_COOKIE['xb']%3);
            Context::set('xb',$_COOKIE['xb']);

            // 템플릿의 스킨 경로를 지정 (skin, colorset에 따른 값을 설정)
            $tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
            Context::set('colorset', $args->colorset);

            // 템플릿 파일을 지정
            $tpl_file = 'banner';

            // 템플릿 컴파일
            $oTemplate = &TemplateHandler::getInstance();
            return $oTemplate->compile($tpl_path, $tpl_file);
        }
    }