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
      'contact-title' : "JetIKy - Контакти",
      'contact' : "Контакти",
      'tittle-quest' : "МАЄТЕ ЗАПИТАННЯ ЩОДО ПРОЕКТУ АБО СПІВПРАЦІ?",
      'answer' : "Вам залюбки відповість",
      'andress' : "Адреса: вулиця Келецька, 98,",
      'city-vn' : "Вінниця, Вінницька область,21000",
      'partners-video' : "Відео-матеріали наших партнерів",
      'hello' : "Привіт,",
      'y-email' : "Ваш Email:",
      'form-back' : "Форма зворотнього зв'язку",
      'enter-your-name' : "Введіть ваше ім'я:",
      'enter-your-phone' : "Введіть ваш номер телефона:",
      'enter-your-email' : "Введіть email:",
      'enter-messange' : "Введіть повідомлення:",
      'send' : "Відправити",
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
      'contact-title' : "JetIKy - Contact",
      'contact' : "Contact",
      'tittle-quest' : "DO YOU HAVE QUESTIONS ABOUT THE PROJECT OR COOPERATION?",
      'answer' : "Will gladly answer you",
      'andress' : "Address: 98 Keletska Street,",
      'tech-adm' : "Tech. moderator JetIKy",
      'city-vn' : "Vinnytsia, Vinnytsia region, 21000",
      'partners-video' : "Video materials of our partners",
      'hello' : "Hello,",
      'y-email' : "Your Email:",
      'form-back' : "Feedback form",
      'enter-your-name' : "Enter your name:",
      'enter-your-phone' : "Enter your phone number:",
      'enter-your-email' : "Enter email:",
      'enter-messange' : "Enter Messange:",
      'send' : "Send",
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