<?php defined('APPLICATION') or die;

$PluginInfo['SuperbLogin'] = array(
    'Name' => 'Superb Login',
    'Description' => 'Changes the login popup to a sliding login panel.',
    'Version' => '0.1',
    'RequiredTheme' => false,
    'RegisterPermissions' => array('SuperbLogin.Settings.Manage'),
    'MobileFriendly' => true,
    'HasLocale' => false,
    'Author' => 'Gianni DaSilva',
    'AuthorUrl' => 'http://infinitum.co/'
);

class SuperbLogin extends Gdn_Plugin {

    public function Base_Render_Before($Sender) {
        $Sender->AddCssFile('plugins/SuperbLogin/style.css');
        $Sender->AddJsFile('plugins/SuperbLogin/script.js');
        $Sender->AddJsFile('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js');
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
            echo "<div id='loginPanel' style='position: relative; z-index: 9999;'>";
            echo "<div class='panelContent'>";
            echo "<div class='pOuter' style='overflow: hidden; height: 0px;'>";
            echo "<div class='pInner' style='margin: -215px auto auto;'>".$Sender->FetchView($this->GetView('view.php'))."</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

}
