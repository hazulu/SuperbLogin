# superb-login
A Sliding Login Form for Vanilla Forums

**A Xenforo-esque login form for Vanilla Forums**

**Todo:**

1. Finish Registration
 1. Change how the registration form is displayed
  1. Change the ajax .load() to something that will allow me to carry over the captcha and password stregnth meter.
2. Polish Code
3. Make the login compatible with mobile and small displays

After registration is done the plugin is pretty much finished.

**Registration**

For those of you that went through the code you probably noticed a lot of code that isn't used.
I disabled the Not-Registered radio button, so if you would like to see what I have done so far please follow these instructions:

1. Make sure you're using any vanilla template with **#Body** as the container for the forums, the default vanilla theme is preferred.

2. Inspect element and remove the disabled code at the end of the **#ctrl_not_registered** Radio Button.

3. Click the now enabled Not-Registered radio button, and enter either a Username or Email in the top input field, as that will be carried to the registration form.

4. Hit Sign Up and watch as the registration form replaces the #Body content.
