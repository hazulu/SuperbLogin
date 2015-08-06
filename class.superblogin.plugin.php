<?php defined('APPLICATION') or die;

$PluginInfo['SuperbLogin'] = array(
    'Name' => 'Superb Login',
    'Description' => 'Changes the login popup to a sliding login panel.',
    'Version' => '0.2',
    'RequiredTheme' => false,
    'MobileFriendly' => true,
    'HasLocale' => false,
    'Author' => 'Gianni DaSilva',
    'AuthorUrl' => 'http://infinitum.co/'
);

class SuperbLogin extends Gdn_Plugin {

    public function Base_Render_Before($Sender) {
        if ($Session->UserID > 0)  return;
        $Sender->AddCssFile('plugins/SuperbLogin/design/style.css');
        $Sender->AddJsFile('plugins/SuperbLogin/js/script.js');
        $Sender->AddJsFile('jquery-ui-1.8.17.custom.min.js');
    }

    public function Setup() {
        
    }

    public function onDisable () {
        
    }

    public function Base_AfterBody_Handler($Sender) {
        $Session = Gdn::Session();
        if ($Session->UserID > 0)  return;
        echo '<div style="position: fixed; top: 0px; left: 0px; right: 0px; bottom: 0px; z-index: 9998; opacity: 0; display: none; background-color: rgb(255, 255, 255);" id="exposeMask"></div>';
    }

    public function Base_AfterRenderAsset_Handler($Sender) {
        $Session = Gdn::Session();
        if ($Session->UserID > 0)  return;
        Gdn::Session()->EnsureTransientKey(); // make sure we have a session
        $AssetName = GetValueR('EventArguments.AssetName', $Sender);
        if ($AssetName == "Head"){
            echo $Sender->FetchView($this->GetView('view.php'));
        }
    }

}
