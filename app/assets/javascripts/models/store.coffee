DS.RESTAdapter.reopen({
  namespace: 'api'
});

Todos.Store = DS.Store.extend
  revision: 12,
  adapter: 'DS.RESTAdapter'
