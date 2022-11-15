let flask = new CodeFlask('#codeBlock', 
{ 
    enableAutocorrect: true,
    lineNumbers: true 
});
const languageSelector = document.getElementById('language_Selector');
const form = document.getElementById('form');

form.addEventListener('formdata', e => {
    const formData = e.formData;
    formData.set('code', flask.getCode());
});
languageSelector.addEventListener('change', e => {
    const code = flask.getCode();
    flask = new CodeFlask('#codeBlock', 
    { 
        language: e.target.value,
        lineNumbers: true 
    });
    flask.addLanguage(e.target.value, Prism.languages[e.target.value]);
    flask.updateCode(code);
});