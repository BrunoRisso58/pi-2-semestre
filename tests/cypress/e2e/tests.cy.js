describe("Login", () => {

    beforeEach(() => {
        cy.visit("http://localhost:3000/login");
    })

    it("Inserir email e senha válidos", () => {
        cy.get('#email').type("bruno@email.com");
        cy.get('#password').type("123teste");
        cy.get('.button-lgn').click();
        cy.get('.pop-up').should("have.text", "Usuário logado com sucesso!")
    })

    it("Inserir email e senha inválidos", () => {
        cy.get('#email').type("brunoinvalido@email.com");
        cy.get('#password').type("invalido");
        cy.get('.button-lgn').click();
        cy.get('.pop-up').should("not.exist");
    })

    it("Inserir email válido e senha inválida", () => {
        cy.get('#email').type("bruno@email.com");
        cy.get('#password').type("invalido");
        cy.get('.button-lgn').click();
        cy.get('.pop-up').should("not.exist");
    })

    it("Tentar fazer login sem digitar as informações", () => {
        cy.get('#email').should("be.empty");
        cy.get('#password').should("be.empty");
        cy.get('.button-lgn').click();
        cy.get('.pop-up').should("not.exist");
    })

})

describe("Site", () => {

    beforeEach(() => {
        cy.visit("http://localhost:3000/");
    })

    it("Rota /", () => {
        cy.get('h1').should("have.text", "Quem somos");
        cy.get('#Home').click();
        cy.get('h1').should("have.text", "Quem somos");
    })

    it("Rota /oqueetdah", () => {
        cy.get('#OqueéTDAH').click();
        cy.url().should('include', '/oqueetdah');
        cy.get('h1').should("have.text", "O que é o TDAH");
    })

    it("Rota /planos", () => {
        cy.get('#Planos').click();
        cy.url().should('include', '/planos');
        cy.get(':nth-child(1) > .v-card > .row > .col > .title').should('have.text', 'Gratuito');
        cy.get(':nth-child(2) > .v-card > .row > .col > .title').should('have.text', 'Intermediário');
        cy.get(':nth-child(3) > .v-card > .row > .col > .title').should('have.text', 'Avançado');
    })

    it("Rota /jogos", () => {
        cy.get('#Jogos').click();
        cy.url().should('include', '/jogos');
    })

    it("Rota /login", () => {
        cy.get('#login').click();
        cy.url().should('include', '/login');
        cy.get('h1').should('have.text', 'Login')
    })

})