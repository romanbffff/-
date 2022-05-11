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
	}
}

  // LoCaL storage
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
            lang = 'en';
        $(this).text(arrLang[lang][$(this).attr('key')]);
    });
}