<?php if (!defined('APPLICATION')) exit(); ?>
  <div class="LoginPanel">
     <?php $this->FireEvent('BeforeSignInButton'); ?>
     <?php
        $Target = Gdn::Request()->PathAndQuery();
        if ($Target != '')
           $Target = '?Target='.urlencode($Target);
        $Controller = Gdn::Controller();
     ?>
      <div class="MainForm MySignIn">
         <?php
         echo $Controller->Form->Open(array('Action' => Url('/entry/signin'.$Target), 'id' => 'Form_User_SignIn'));
         echo $Controller->Form->Errors();
         ?>
         <div class="Wrap">
             <div class="ctrlWrapper">
                <dl class="ctrlUnit">
                    <dt><?php echo $Controller->Form->Label('Your name or email address:', 'Email'); ?></dt>
                    <dd><?php echo $Controller->Form->TextBox('Email', array('class' => 'InputBox Password', 'tabindex' => '101')); ?></dd>
                </dl>

                <dl class="ctrlUnit">
                    <dt>
                        <?php echo $Controller->Form->Label('Do you already have an account?', 'Password'); ?>
                    </dt>
                    <dd>
                        <ul>
                            <li><label for="ctrl_not_registered"><input type="radio" name="register" value="1" id="ctrl_not_registered">
                                No, create an account now.</label></li>
                            <li><label for="ctrl_registered"><input type="radio" name="register" value="0" id="ctrl_registered" checked="checked" class="Disabler">
                                Yes, my password is:</label></li>
                            <li id="ctrl_registered_Disabler">
                                <?php
                                  echo $Controller->Form->Input('Password', 'password', array('class' => 'InputBox Password', 'tabindex' => '102'));
                                  echo Anchor(T('Forgot your password?'), '/entry/passwordrequest', 'ForgotPassword');
                               ?>
                            </li>
                        </ul>
                    </dd>
                </dl>
                
                <dl class="ctrlUnit submitUnit">
                    <dt></dt>
                    <dd>
                    <?php
                        echo $Controller->Form->Button('Sign In');
                        echo $Controller->Form->CheckBox('RememberMe', T('Keep me signed in'), array('value' => '1', 'id' => 'SignInRememberMe'));
                    ?>
                    </dd>
                </dl>
            </div>
        </div>
         
         <?php
         echo $Controller->Form->Close();
         echo $Controller->Form->Open(array('Action' => Url('/entry/passwordrequest'), 'id' => 'Form_User_Password', 'style' => 'display: none;'));
         ?>
         <ul>
            <li>
               <?php
                  echo $Controller->Form->Label('Enter your Email address or username', 'Email');
                  echo $Controller->Form->TextBox('Email');
               ?>
            </li>
            <li class="Buttons">
               <?php
                  echo $Controller->Form->Button('Request a new password');
                  echo Wrap(Anchor(T('I remember now!'), '/entry/signin', 'ForgotPassword'), 'div');
               ?>
            </li>
         </ul>
         <?php echo $Controller->Form->Close(); ?>
      </div>
     <?php $this->FireEvent('AfterSignInButton'); ?>
  </div>