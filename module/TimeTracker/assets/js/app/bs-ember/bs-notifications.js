Bootstrap.Notification.reopen({
    classType: (function() {
        var baseClasses = "col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4";
        if (this.type != null) {
            return baseClasses + " alert-" + this.type;
        } else {
            return baseClasses;
        }
    }).property('type').cacheable()
});
