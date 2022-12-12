import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _419664dd = () => interopDefault(import('..\\pages\\cadastro.vue' /* webpackChunkName: "pages/cadastro" */))
const _8af77c9c = () => interopDefault(import('..\\pages\\jogos.vue' /* webpackChunkName: "pages/jogos" */))
const _4eecd316 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages/login" */))
const _39a1f456 = () => interopDefault(import('..\\pages\\oqueetdah.vue' /* webpackChunkName: "pages/oqueetdah" */))
const _7521f9b2 = () => interopDefault(import('..\\pages\\pagamento.vue' /* webpackChunkName: "pages/pagamento" */))
const _11dda3f0 = () => interopDefault(import('..\\pages\\perfil.vue' /* webpackChunkName: "pages/perfil" */))
const _28cb771e = () => interopDefault(import('..\\pages\\planos.vue' /* webpackChunkName: "pages/planos" */))
const _bda0cfd0 = () => interopDefault(import('..\\pages\\quem-somos.vue' /* webpackChunkName: "pages/quem-somos" */))
const _0ee1f35e = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/cadastro",
    component: _419664dd,
    name: "cadastro"
  }, {
    path: "/jogos",
    component: _8af77c9c,
    name: "jogos"
  }, {
    path: "/login",
    component: _4eecd316,
    name: "login"
  }, {
    path: "/oqueetdah",
    component: _39a1f456,
    name: "oqueetdah"
  }, {
    path: "/pagamento",
    component: _7521f9b2,
    name: "pagamento"
  }, {
    path: "/perfil",
    component: _11dda3f0,
    name: "perfil"
  }, {
    path: "/planos",
    component: _28cb771e,
    name: "planos"
  }, {
    path: "/quem-somos",
    component: _bda0cfd0,
    name: "quem-somos"
  }, {
    path: "/",
    component: _0ee1f35e,
    name: "index"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
