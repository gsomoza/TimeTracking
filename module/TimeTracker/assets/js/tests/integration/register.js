module("Register Page", {
    setup: function() {
        // before each test, ensure the application is ready to run.
        Ember.run(App, App.advanceReadiness);
    },

    teardown: function() {
        // reset the application state between each test
        App.reset();
    }
});

test("Contents", function() {
    // async helper telling the application to go to the '/' route
    visit("register");

    // helper waiting the application is idle before running the callback
    andThen(function() {
        equal(find("h1").text(), "Register", "Register page is rendered");
        equal(find("form#registerForm").length, 1, "There's a register form");
        equal(find("#registerForm #register-username").length, 1, "There's a username field");
        equal(find("#registerForm #register-password").length, 1, "There's a password field");
        equal(find("#registerForm #registerButton").length, 1, "There's a Register button");
        equal(find("#registerForm #loginButton").length, 1, "There's a Login button");
    });
});
