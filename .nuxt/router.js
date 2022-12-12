import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _83241304 = () => interopDefault(import('..\\pages\\cadastro.vue' /* webpackChunkName: "pages/cadastro" */))
const _6e19fbb1 = () => interopDefault(import('..\\pages\\jogos.vue' /* webpackChunkName: "pages/jogos" */))
const _e7c15f18 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages/login" */))
const _57bc96d5 = () => interopDefault(import('..\\pages\\oqueetdah.vue' /* webpackChunkName: "pages/oqueetdah" */))
const _d986c79e = () => interopDefault(import('..\\pages\\pagamento.vue' /* webpackChunkName: "pages/pagamento" */))
const _5e01ac5e = () => interopDefault(import('..\\pages\\perfil.vue' /* webpackChunkName: "pages/perfil" */))
const _aa886b5c = () => interopDefault(import('..\\pages\\planos.vue' /* webpackChunkName: "pages/planos" */))
const _46694579 = () => interopDefault(import('..\\pages\\quem-somos.vue' /* webpackChunkName: "pages/quem-somos" */))
const _7b10a546 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))

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
    component: _83241304,
    name: "cadastro"
  }, {
    path: "/jogos",
    component: _6e19fbb1,
    name: "jogos"
  }, {
    path: "/login",
    component: _e7c15f18,
    name: "login"
  }, {
    path: "/oqueetdah",
    component: _57bc96d5,
    name: "oqueetdah"
  }, {
    path: "/pagamento",
    component: _d986c79e,
    name: "pagamento"
  }, {
    path: "/perfil",
    component: _5e01ac5e,
    name: "perfil"
  }, {
    path: "/planos",
    component: _aa886b5c,
    name: "planos"
  }, {
    path: "/quem-somos",
    component: _46694579,
    name: "quem-somos"
  }, {
    path: "/",
    component: _7b10a546,
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
