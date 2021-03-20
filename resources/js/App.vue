<template>
  <div id="app">
    <nav-bar/>
    <aside-menu :menu="menu"/>
    <router-view/>
    <footer-bar/>
  </div>
</template>

<script>
// @ is an alias to /src
import NavBar from '@/components/NavBar'
import AsideMenu from '@/components/AsideMenu'
import FooterBar from '@/components/FooterBar'

export default {
  name: 'home',
  components: {
    FooterBar,
    AsideMenu,
    NavBar
  },
  computed: {
    menu () {
      return [
        'General', [{
            to: '/',
            icon: 'desktop-mac',
            label: 'Dashboard'
          }
        ], [
          {
          to: '/products/index',
          label: 'Products',
          icon: 'barcode-scan',
          // updateMark: true
        },{
          to: '/orders/index',
          label: 'Orders',
          icon: 'basket',
          // updateMark: true
        },{
          to: '/suppliers/index',
          label: 'Suppliers',
          icon: 'truck',
          // updateMark: true
        }, {
            to: '/clients/index',
            label: 'Clients',
            icon: 'account-multiple',
            updateMark: true
          },
        ],
      ]
    }
  },
  created () {
    axios
      .get('/user')
      .then(r => {
        this.$store.commit('user', r.data.data)
      })
      .catch(err => {
        this.$buefy.toast.open({
          message: `Error: ${err.message}`,
          type: 'is-danger'
        })
      })
  }
}
</script>
