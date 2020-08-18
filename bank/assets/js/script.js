function Form({ option }) {
  return (
    React.createElement("form",  { Method: "post", onSubmit: evt => evt.preventDefault() },
    React.createElement("div",   { className: 'account-form-fields ' + (option === 1 ? 'sign-in' : option === 2 ? 'sign-up' : 'forgot') },
    React.createElement("input", { class: "input", name: "email", type: "email", placeholder: "E-mail", required: true }),
    React.createElement("input", { class: "input", name: "password", type: "password", placeholder: "Password", required: option === 1 || option === 2 ? true : false, disabled: option === 3 ? true : false }),
    React.createElement("input", { id: "repeat-password", class: "input", name: "repassword", type: "password", placeholder: "Repeat password", required: option === 2 ? true : false, disabled: option === 1 || option === 3 ? true : false }),
    React.createElement("div", {className:"g-recaptcha",sitekey: '6Ld2pbsZAAAAALTRnktgLhI8WbfYDgN99Dh8lNz0'})),
    React.createElement("button", { className: "button", name:(option === 1 ? 'signin' : option === 2 ? 'signup' : 'forgot'), type: "submit" },
    option === 1 ? 'Sign in' : option === 2 ? 'Sign up' : 'Reset password')));

}

function App() {
  const [option, setOption] = React.useState(1);

  return (
    React.createElement("div", { className: "container" },
    React.createElement("header", null,
    React.createElement("div", { className: 'header-headings ' + (option === 1 ? 'sign-in' : option === 2 ? 'sign-up' : 'forgot') },
    React.createElement("span", null, "Sign in to your account"),
    React.createElement("span", null, "Create an account"),
    React.createElement("span", null, "Reset your password"))),


    React.createElement("ul", { className: "options" },
    React.createElement("li", { className: option === 1 ? 'active' : '', onClick: () => setOption(1) }, "Sign in"),
    React.createElement("li", { className: option === 2 ? 'active' : '', onClick: () => setOption(2) }, "Sign up"),
    React.createElement("li", { className: option === 3 ? 'active' : '', onClick: () => setOption(3) }, "Forgot")),

    React.createElement(Form, { option: option })));



}

ReactDOM.render(React.createElement(App, null), document.getElementById('app'));