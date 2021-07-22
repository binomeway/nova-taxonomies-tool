Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'nova-taxonomies-tool',
      path: '/nova-taxonomies-tool',
      component: require('./components/Tool'),
    },
  ])
})
