<?php
class Shopware_Plugins_Frontend_HostiSocial_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{

    public function getLabel()
    {
        return 'Social Buttons';
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'author' => 'Hostianer Media UG',
            'supplier' => 'Hostianer Media UG',
            'description' => 'Bindet Social Buttons in der Detail Ansicht ein.',
            'support' => 'Shopware Forum',
            'link' => 'https://blog.hostianer.de'
        );
    }

    public function install()
    {

       $this->subscribeEvent(
            'Theme_Compiler_Collect_Plugin_Less',
            'addLessFiles'
        );

        $this->subscribeEvent(
            'Theme_Compiler_Collect_Plugin_Javascript',
            'addJsFiles'
        );

        $this->subscribeEvent(
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail',
            'onFrontendPostDispatch'
        );

        return true;
    }


    public function enable()
    {
        return [
            'success' => true,
            'invalidateCache' => ['template', 'theme']
        ];
    }


    public function addLessFiles(Enlight_Event_EventArgs $args)
    {
        $less = new \Shopware\Components\Theme\LessDefinition(
            array(

            ),
            //less files to compile
            array(
                __DIR__ . '/Views/frontend/_public/src/less/all.less'
            ),

            //import directory
            __DIR__
        );

        return new Doctrine\Common\Collections\ArrayCollection(array($less));
    }

    /**
     * Provide the file collection for js files
     *
     * @param Enlight_Event_EventArgs $args
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function addJsFiles(Enlight_Event_EventArgs $args)
    {
        $jsFiles = array(__DIR__ . '/Views/frontend/_public/src/js/rrssb.min.js');
        return new Doctrine\Common\Collections\ArrayCollection($jsFiles);
    }

    public function onFrontendPostDispatch(Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $view = $controller->View();
        $view->addTemplateDir(
            __DIR__ . '/Views'
        );
    }
}