App.ApplicationSerializer = App.BaseSerializer.extend({

    extract: function(store, type, payload, id, requestType) {
        this.extractMeta(store, type, payload);

        if(payload._embedded)
            payload = payload._embedded;

        if(['createRecord', 'updateRecord'].indexOf(requestType) >= 0){
            var data = {};
            data[type.typeKey] = payload;
            payload = data;
        }

        var specificExtract = "extract" + requestType.charAt(0).toUpperCase() + requestType.substr(1);
        return this[specificExtract](store, type, payload, id, requestType);
    }
});

