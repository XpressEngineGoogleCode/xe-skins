<?php
    /**
     * @class  kin
     * @author zero (skklove@gmail.com)
     * @brief  kin high class
     **/

    class kin extends ModuleObject {

        var $search_option = array('title','content','title_content','comment','user_name','nick_name','user_id','tag'); 

        function moduleInstall() {
            return new Object();
        }

        function checkUpdate() {
            return false;
        }

        function moduleUpdate() {
            return new Object(0, 'success_updated');
        }

        function recompileCache() {
        }
    }
?>
