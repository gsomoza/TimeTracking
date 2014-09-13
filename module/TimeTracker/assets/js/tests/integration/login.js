// common QUnit module declaration
module("Login Page", {
    setup: function() {
        // before each test, ensure the application is ready to run.
        Ember.run(App, App.advanceReadiness);
    },

    teardown: function() {
        // reset the application state between each test
        App.reset();
    }
});

// QUnit test case
test("Contents", function() {
    // async helper telling the application to go to the '/' route
    visit("/");

    // helper waiting the application is idle before running the callback
    andThen(function() {
        equal(find("h1").text(), "Login", "Login page is rendered");
        equal(find("form#loginForm").length, 1, "There's a login form");
        equal(find("#loginForm #identification").length, 1, "There's an #identification field");
        equal(find("#loginForm #password").length, 1, "There's a #password field");
        equal(find("#loginForm #loginButton").length, 1, "There's a Login button");
        equal(find("#loginForm #registerButton").length, 1, "There's a Register button");
    });
});

test("Empty submit", function() {
    visit("/");

    andThen(function(){
        click('#loginButton');
        andThen(function(){
            var alert = find('.alert.in');
            equal(alert.length, 1, 'One alert is shown.');
            ok(alert.text().indexOf('Missing parameters') >= 0);
        });
    });
});

test("Partial submit: username", function() {
    visit("/");

    andThen(function(){
        fillIn('#identification', 'test');
        click('#loginButton');

        andThen(function(){
            var alert = find('.alert.in');
            equal(alert.length, 1, 'One alert is shown.');
            ok(alert.text().indexOf('Missing parameters') >= 0);
        });
    });
});

test("Partial submit: password", function() {
    visit("/");

    andThen(function(){
        fillIn('#password', 'test');
        click('#loginButton');

        andThen(function(){
            var alert = find('.alert.in');
            equal(alert.length, 1, 'One alert is shown.');
            ok(alert.text().indexOf('Missing parameters') >= 0, 'Missing parameters message shown.');
            equal(find('#password').val(), '', 'Password field is reset.');
        });
    });
});

test("Go to Register", function(){
    visit('/');
    andThen(function(){
        click('#registerButton');
        andThen(function () {
            equal(currentRouteName(), 'register');
            equal(currentPath(), 'register');
            equal(currentURL(), '/register');
        })
    });
});

test("Invalid Username", function() {
    visit('/');
    andThen(function () {
        // NOTE: when testing, make sure the following username/password combination is not valid
        fillIn('#identification', 'asdf');
        fillIn('#password', 'asdf');
        click('#loginButton');
        andThen(function () {
            var alert = find('.alert.in');
            equal(alert.length, 1, 'One alert is shown');
            ok(alert.text().indexOf('Invalid username and password combination') >= 0);
        });
    });
});
