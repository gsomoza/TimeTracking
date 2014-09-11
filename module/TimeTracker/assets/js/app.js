window.ENV = window.ENV || {};
window.ENV['simple-auth'] = {
    routeAfterAuthentication: 'worklogs',
    authenticationRoute: 'login',
    authorizer: 'authorizer:custom',
    session: 'session:custom'
};
window.ENV['simple-auth-oauth2'] = {
    serverTokenEndpoint: '/oauth',
    clientId: 'timetrackerWssEuXCP'
};


Ember.Application.initializer({
    name: 'authentication',
    before: 'simple-auth',
    initialize: function (container, application) {
        // register the custom authenticator so the session can find it
        container.register('authenticator:apigility', App.ApigilityAuthenticator);
        container.register('authorizer:custom', App.CustomAuthorizer);
        container.register('session:custom', App.CustomSession);
    }
});

App = Ember.Application.create({
    LOG_TRANSITIONS: true,
    LOG_TRANSITIONS_INTERNAL: true,
    LOG_ACTIVE_GENERATION: true,
    LOG_RESOLVER: true,
    LOG_BINDINGS: true
});

App.dateFormats = {
    form: 'YYYY-MM-DD',
    mysql: 'YYYY-MM-DD'
};
