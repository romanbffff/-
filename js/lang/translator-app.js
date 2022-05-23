var arrLang = {
    'ua': {
      'unit' : "JetIKy - Ми краще за Jet!", 
      'home' : 'Головна',
      'contact' : 'Контакти',
      'simulator' : 'Тренажер',
      'shedule' : 'Розклад',
      'login' : 'Вхід',
      'title' : 'JetIKy - Навчальна платформа',
      'description' : 'Онлайн платформа для дистанційного навчання',
      'parametrs' : 'Безкоштовна форма навчання',
      'goodmaterials' : 'Зрозуміле подання матеріалів',
      'viewing' : 'Можливість переглядати вебінари',
      'simulatorZNO' : 'Тренажер ЗНО',
      'ukrlangandlitr' : 'Українська мова і література',
      'ukrlang' : 'Українська мова',
      'math' : 'Математика',
      'history' : 'Історія',
      'geography' : 'Географія',
      'biology' : 'Біологія',
      'physics' : 'Фізика',
      'chemestry' : 'Хімія',
      'english' : 'Англійська мова',
      'cab' : 'Кабінет',
      'logout' : 'Вихід',
      'sign-in' : 'Авторизація',
      'sign-up' : 'Реєстрація',
      'sign-up1' : 'Створити',
      'sign-up2' : 'Зареєструватися',
      'enter-captcha' : 'Введіть капчу:',
      'none-ac?' : 'Немає аккаунту?',
      'password' : 'Пароль:',
      'sign-in1' : 'Увійти',
      'name' : "Ім'я:",
      'surname' : "Прізвище:",
      'you-sign-up' : "Ви вже зареєстровані",
      'persn-acc' : "JetIKy - Особистий кабінет",
      'persn-sign-in' : "JetIKy - Авторизація",
      'persn-sign-up' : "JetIKy - Реєстрація",
	},
	'en' : {
      'unit' : "JetIKy - We are better than Jet!",
      'home' : 'Home',
	  'contact' : 'Contact',
      'simulator' : 'Simulator',
      'shedule' : 'Shedule',
      'login' : 'Sign-in',
      'title' : 'JetIKy - Learning platform',
      'description' : 'Online platform for distance learning',
      'parametrs' : 'Free form of education',
      'goodmaterials' : 'Clear presentation of materials',
      'viewing' : 'Ability to view webinars',
      'simulatorZNO' : 'Simulator ZNO',
      'ukrlangandlitr' : 'Ukrainian language and literature',
      'ukrlang' : 'Ukrainian language',
      'math' : 'Math',
      'history' : 'History',
      'geography' : 'Geography',
      'biology' : 'Biology',
      'physics' : 'Physics',
      'chemestry' : 'Chemestry',
      'english' : 'English',
      'cab' : 'Account',
      'logout' : 'Log-out',
      'sign-in' : 'Sign-in',
      'sign-up' : 'Sign-up',
      'sign-up1' : 'Sign-up',
      'sign-up2' : 'Sign-up',
      'password' : 'Password:',
      'enter-captcha' : 'Enter Captcha:',
      'none-ac?' : 'No account?',
      'sign-in1' : 'Sign-in',
      'name' : 'Name:',
      'surname' : "Surname:",
      'you-sign-up' : "You are already registered",
      'persn-acc' : "JetIKy - Personal account",
      'persn-sign-in' : "JetIKy - Sign-in",
      'persn-sign-up' : "JetIKy - Sign-up",
	}
}

  // LoCaL storage
  let lang;
  $(function() {
    if(localStorage.getItem('lang'))
    {
       lang = localStorage.getItem('lang');
    }
    loadLanguage();
    $('.translate').on('click', (e) => {
        lang = e.target.id;
 
        loadLanguage();
        localStorage.setItem('lang', lang);
    });
});
function loadLanguage(){
    $('.lang').each(function() {
        if(arrLang[lang] == undefined)
            lang = 'ua';
        $(this).text(arrLang[lang][$(this).attr('key')]);
    });
}