/**
 * Client Resource Factory.
 * 
 * Clients API: 
 * URL                  METHOD      BODY        RESULT
 * api/clients          GET         empty       Returns all clients
 * api/clients          POST        JSON        Creates a new client
 * api/clients/:id      GET         JSON        Returns a single client
 * api/clients/:id      POST        JSON        Updates an existing client
 * api/clients/:id      DELETE      empty       Deletes an existing client
 * 
 */
app.factory('Client', ['$resource', function($resource){
    return $resource('api/clients/:id', { id: '@id' });
}]);