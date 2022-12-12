export { default as FooterMobile } from '../..\\components\\footer\\footerMobile.vue'
export { default as FooterVue } from '../..\\components\\footer\\footerVue.vue'
export { default as Header } from '../..\\components\\header\\header.vue'
export { default as HeaderMobile } from '../..\\components\\header\\headerMobile.vue'
export { default as Cadastro } from '../..\\components\\cadastro\\cadastro.vue'
export { default as CadastroMobile } from '../..\\components\\cadastro\\cadastroMobile.vue'
export { default as HomeQuemsomos } from '../..\\components\\home\\quemsomos.vue'
export { default as HomeTdah } from '../..\\components\\home\\tdah.vue'
export { default as Jogos } from '../..\\components\\jogos\\jogos.vue'
export { default as Login } from '../..\\components\\login\\login.vue'
export { default as LoginMobile } from '../..\\components\\login\\loginMobile.vue'
export { default as Perfil } from '../..\\components\\perfil\\perfil.vue'
export { default as PerfilMobile } from '../..\\components\\perfil\\perfilMobile.vue'
export { default as Planos } from '../..\\components\\planos\\planos.vue'

// nuxt/nuxt.js#8607
function wrapFunctional(options) {
  if (!options || !options.functional) {
    return options
  }

  const propKeys = Array.isArray(options.props) ? options.props : Object.keys(options.props || {})

  return {
    render(h) {
      const attrs = {}
      const props = {}

      for (const key in this.$attrs) {
        if (propKeys.includes(key)) {
          props[key] = this.$attrs[key]
        } else {
          attrs[key] = this.$attrs[key]
        }
      }

      return h(options, {
        on: this.$listeners,
        attrs,
        props,
        scopedSlots: this.$scopedSlots,
      }, this.$slots.default)
    }
  }
}
