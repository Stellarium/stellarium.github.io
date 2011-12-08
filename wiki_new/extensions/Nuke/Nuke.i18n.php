<?php
/**
 * Internationalisation file for the Nuke extension
 *
 * @file
 * @ingroup Extensions
 * @author Brion Vibber
 */

$messages = array();

/** English
 * @author Brion Vibber
 */
$messages['en'] = array(
	'nuke'               => 'Mass delete',
	'nuke-desc'          => 'Gives administrators the ability to [[Special:Nuke|mass delete]] pages',
	'nuke-nopages'       => "No new pages by [[Special:Contributions/$1|$1]] in recent changes.",
	'nuke-list'          => "The following pages were recently created by [[Special:Contributions/$1|$1]];
put in a comment and hit the button to delete them.",
	'nuke-list-multiple' => 'The following pages were recently created;
put in a comment and hit the button to delete them.',
	'nuke-defaultreason' => "Mass deletion of pages added by $1",
	'nuke-tools'         => 'This tool allows for mass deletions of pages recently added by a given user or an IP address.
Input the username or IP address to get a list of pages to delete, or leave blank for all users.',
	'nuke-submit-user'   => 'Go',
	'nuke-submit-delete' => 'Delete selected',
	'right-nuke'         => 'Mass delete pages',
	'nuke-select'        => 'Select: $1',
	'nuke-userorip'      => 'Username, IP address or blank:',
	'nuke-maxpages'      => 'Maximum number of pages:',
	'nuke-multiplepeople'=> 'multiple users',
	'nuke-editby'        => 'Created by [[Special:Contributions/$1|$1]]',
	'nuke-deleted'       => "Page '''$1''' has been deleted.",
	'nuke-not-deleted'   => "Page [[:$1]] '''could not''' be deleted.",
);

/** Message documentation (Message documentation)
 * @author Jon Harald Søby
 * @author Meno25
 * @author Purodha
 * @author The Evil IP address
 */
$messages['qqq'] = array(
	'nuke-desc' => '{{desc}}',
	'nuke-submit-user' => '{{Identical|Go}}',
	'right-nuke' => '{{doc-right}}',
	'nuke-select' => '{{Identical|Select}}',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$messages['niu'] = array(
	'nuke-submit-user' => 'Fano',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'nuke' => 'Massa verwyder',
	'nuke-nopages' => 'Geen nuwe bladsye [[Special:Contributions/$1|$1]] in onlangse wysigings.',
	'nuke-defaultreason' => 'Massa verwydering van bladsye van $1',
	'nuke-submit-user' => 'Laat waai',
	'nuke-submit-delete' => 'Skrap geselekteerde',
	'right-nuke' => 'Massa verwydering van bladsye',
	'nuke-select' => 'Selekteer: $1',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'nuke' => 'Borrato masivo',
	'nuke-desc' => 'Da a os almenistradors a capacidat de fer [[Special:Nuke|borratos masivos]] de pachinas',
	'nuke-nopages' => 'No bi ha garra pachina nueva feita por [[Special:Contributions/$1|$1]] entre os zaguers cambeos.',
	'nuke-list' => 'A siguients pachinas fuoron creyatas por [[Special:Contributions/$1|$1]]; escriba un comentario y punche o botón ta borrar-los.',
	'nuke-defaultreason' => "Borrato masivo d'as pachinas adhibitas por $1",
	'nuke-tools' => "Ista ferramienta fa posible de fer borratos masivos de pachinas adhibitas en zaguerías por un usuario u adreza IP datos. Escriba o nombre d'usuario u l'adreza IP ta obtener una lista de pachinas ta borrar:",
	'nuke-submit-user' => 'Ir-ie',
	'nuke-submit-delete' => 'Borrar as trigatas',
	'right-nuke' => 'Borrar pachinas masivament',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'nuke' => 'حذف كمي',
	'nuke-desc' => 'يعطي مدراء النظام القدرة على [[Special:Nuke|الحذف الكمي]] للصفحات',
	'nuke-nopages' => 'لا صفحات جديدة بواسطة [[Special:Contributions/$1|$1]] في أحدث التغييرات.',
	'nuke-list' => 'الصفحات التالية تم إنشاؤها حديثا بواسطة [[Special:Contributions/$1|$1]]؛
ضع تعليقا واضغط الزر لحذفهم.',
	'nuke-defaultreason' => 'إزالة كمية للصفحات المضافة بواسطة $1',
	'nuke-tools' => 'هذه الأداة تسمح بالحذف الضخم للصفحات المضافة حديثا بواسطة مستخدم أو أيبي معطى.
أدخل اسم المستخدم أو الأيبي لعرض قائمة بالصفحات للحذف:',
	'nuke-submit-user' => 'اذهب',
	'nuke-submit-delete' => 'حذف المختار',
	'right-nuke' => 'حذف الصفحات كميا',
);

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'nuke-submit-user' => 'ܙܠ',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'nuke' => 'مسح كبير',
	'nuke-desc' => 'بيدى السيسوبات امكانية  [[Special:Nuke|المسح الكبير]] للصفحات',
	'nuke-nopages' => '[[Special:Contributions/$1|$1]]  ماعملش صفحات جديدة فى احدث التغيرات.',
	'nuke-list' => 'الصفحات دى اتعملها انشاء قريب عى طريق [[Special:Contributions/$1|$1]];
اكتب تعليق و دوس على الزرار علشان تمسحهم.',
	'nuke-defaultreason' => 'مسح كبير للصفحات اللى ضافها $1',
	'nuke-tools' => 'الطريقة دى بتسمحلك تعمل مسح كبير للصفحات اللى اتضافت قريب عن طريق واحد من اليوزرز او الأى بى.
دخل اسم اليوزر او عنوان الاى بى علشان تطلعلك لستة بالصفحات اللى ح تتمسح.',
	'nuke-submit-user' => 'روح',
	'nuke-submit-delete' => 'امسح اللى اخترته',
	'right-nuke' => 'مسح كبير للصفحات',
);

/** Asturian (Asturianu)
 * @author Esbardu
 * @author Xuacu
 */
$messages['ast'] = array(
	'nuke' => 'Esborráu masivu',
	'nuke-desc' => "Da a los alministradores la capacidá d'[[Special:Nuke|esborrar páxines masivamente]]",
	'nuke-nopages' => 'Nun hai páxines nueves de [[Special:Contributions/$1|$1]] nos cambeos recientes.',
	'nuke-list' => 'Les páxines siguientes foron creaes recién por [[Special:Contributions/$1|$1]]; escribi un comentariu y calca nel botón pa esborrales.',
	'nuke-list-multiple' => "Les páxines darréu se crearon recientemente;
escribi un comentariu y calca'l botón pa desaniciales.",
	'nuke-defaultreason' => 'Esborráu masivu de páxines añadíes por $1',
	'nuke-tools' => "Esta ferramienta permite desanicios masivos de páxines añadíes recién por un usuariu o una IP determinada. Escribi'l nome d'usuariu o la IP pa obtener una llista de páxines a desaniciar, o dexa en blanco pa tolos usuarios.",
	'nuke-submit-user' => 'Dir',
	'nuke-submit-delete' => 'Esborrar seleicionaes',
	'right-nuke' => 'Esborráu masivu de páxines',
	'nuke-select' => 'Seleicionar: $1',
	'nuke-userorip' => "Nome d'usuariu, direición IP o en blanco:",
	'nuke-maxpages' => 'Máximu númberu de páxines:',
	'nuke-multiplepeople' => 'múltiples usuarios',
	'nuke-editby' => 'Creáu por [[Special:Contributions/$1|$1]]',
);

/** Bashkir (Башҡортса)
 * @author Assele
 */
$messages['ba'] = array(
	'nuke' => 'Күпләп юйыу',
	'nuke-desc' => 'Хәкимдәргә биттәрҙе [[Special:Nuke|күпләп юйыу]] мөмкинлеген бирә',
	'nuke-nopages' => 'Һуңғы үҙгәртеүҙәрҙә [[Special:Contributions/$1|$1]] тарафынан булдырылған биттәр юҡ.',
	'nuke-list' => 'Түбәндәге биттәр [[Special:Contributions/$1|$1]] тарафынан яңыраҡ булдырылған.
Уларҙы юйыр өсөн, аңлатма керетегеҙ һәм төймәгә баҫығыҙ.',
	'nuke-defaultreason' => '$1 тарафынан булдырылған биттәрҙе күпләп юйыу',
	'nuke-tools' => 'Был бит билдәләнгән ҡатнашыусы йәки IP адрес тарафынан булдырылған биттәрҙе күпләп юйыу мөмкинлеген бирә.
Юйыла торған биттәр исемлеген алыр өсөн, ҡатнашыусы исемен йәки IP адресты керетегеҙ.',
	'nuke-submit-user' => 'Үтәргә',
	'nuke-submit-delete' => 'Һайланғандарҙы юйырға',
	'right-nuke' => 'Биттәрҙе күпләп юйыу',
	'nuke-select' => 'Һайланған: $1',
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'nuke' => 'حذف جمعی',
	'nuke-desc' => 'مدیران سیستمء ای توانایی دنت تا صفحات  [[Special:Nuke|حذف جمعی]]',
	'nuke-nopages' => 'هچ نوکین صفحه په وسیله  [[Special:Contributions/$1|$1]] ته نوکین تغییرات.',
	'nuke-list' => 'جهلگین صفحات نوکی شر بیتگین گون [[Special:Contributions/$1|$1]];
توضیحی بویسیت و دکمه بجنیت تا آیانء حذف کنت.',
	'nuke-defaultreason' => 'حذف جمعی صفحات اضافه بوتت په وسیله $1',
	'nuke-tools' => 'ای وسیله شما را اجازت دن تا صفحاتی که گون یک داتگین کاربر یا آی پی شربیتگن حذفش کنت.
نام کاربری یا آی پی وارد کنیت تا یک لیستی چه صفحات په حذف پیشداریتن.',
	'nuke-submit-user' => 'برو',
	'nuke-submit-delete' => 'انتخاب بوتگین حذف',
	'right-nuke' => 'حذف جمعی صفحات',
);

/** Belarusian (Беларуская)
 * @author Yury Tarasievich
 * @author Хомелка
 */
$messages['be'] = array(
	'nuke' => 'Масавае сціранне',
	'nuke-desc' => 'Дае адміністратарам магчымасць [[Special:Nuke|масавага выдалення]] старонак',
	'nuke-nopages' => 'Няма новых старонак аўтарства [[Special:Contributions/$1|$1]] у нядаўніх змяненнях.',
	'nuke-list' => 'Наступныя старонкі былі нядаўна створаныя [[Special:Contributions/$1|$1]];
упішыце тлумачэнне і націсніце кнопку, каб іх сцерці.',
	'nuke-defaultreason' => 'Масавае сціранне старонак, створаных $1',
	'nuke-tools' => 'Інструмент дазваляе масава сціраць старонкі, дададзеныя нядаўна пэўным удзельнікам ці з пэўнага IP-адрасу.
Упішыце імя ўдзельніка ці IP, каб атрымаць пералік старонак, якія можна сцерці.',
	'nuke-submit-user' => 'Наперад',
	'nuke-submit-delete' => 'Сцерці пазначанае',
	'right-nuke' => 'масава сціраць старонкі',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'nuke' => 'Масавае выдаленьне',
	'nuke-desc' => 'Дае адміністратарам магчымасьць [[Special:Nuke|масавага выдаленьня]] старонак',
	'nuke-nopages' => 'У апошніх зьменах няма новых старонак, створаных [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Наступныя старонкі былі нядаўна створаны ўдзельнікам [[Special:Contributions/$1|$1]];
дадайце камэнтар і націсьніце кнопку для іх выдаленьня.',
	'nuke-list-multiple' => 'Наступныя старонкі былі створаны нядаўна;
устаўце камэнтар і націсьніце кнопку каб іх выдаліць.',
	'nuke-defaultreason' => 'Масавае выдаленьне старонак, створаных удзельнікам $1',
	'nuke-tools' => 'Гэты інструмэнт дазваляе рабіць масавыя выдаленьні старонак, створаных пэўным удзельнікам альбо з IP-адрасу. Увядзіце імя ўдзельніка ці IP-адрас для таго, каб атрымаць сьпіс старонак для выдаленьня, ці пакіньце пустым для ўсіх удзельнікаў.',
	'nuke-submit-user' => 'Выканаць',
	'nuke-submit-delete' => 'Выдаліць выбраныя',
	'right-nuke' => 'масавае выдаленьне старонак',
	'nuke-select' => 'Выбраць: $1',
	'nuke-userorip' => 'Удзельнік, IP-адрас ці пустое:',
	'nuke-maxpages' => 'Максымальная колькасьць старонак:',
	'nuke-multiplepeople' => 'некалькі ўдзельнікаў',
	'nuke-editby' => 'Створана [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => 'Старонка «$1» выдаленая.',
	'nuke-not-deleted' => "Старонка [[:$1]] '''ня можа''' быць выдаленая.",
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 * @author Spiritia
 */
$messages['bg'] = array(
	'nuke' => 'Масово изтриване',
	'nuke-desc' => 'Предоставя на администраторите възможност за [[Special:Nuke|масово изтриване]] на страници',
	'nuke-nopages' => 'Сред последните промени не съществуват нови страници, създадени от [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Следните страници са били наскоро създадени от [[Special:Contributions/$1|$1]]. Напишете коментар и щракнете бутона, за да ги изтриете.',
	'nuke-defaultreason' => 'Масово изтриване на страници, създадени от $1',
	'nuke-tools' => 'Този инструмент позволява масовото изтриване на страници, създадени от даден регистриран или анонимен потребител. Въведете потребителско име или IP, за да получите списъка от страници за изтриване:',
	'nuke-submit-user' => 'Отваряне',
	'nuke-submit-delete' => 'Изтриване на избраните',
	'right-nuke' => 'масово изтриване на страници',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Wikitanvir
 * @author Zaheen
 */
$messages['bn'] = array(
	'nuke' => 'গণ মুছে ফেলা',
	'nuke-desc' => 'প্রশাসকদের পাতাগুলি [[Special:Nuke|গণহারে মুছে ফেলার]] ক্ষমতা দেয়',
	'nuke-nopages' => 'সাম্প্রতিক পরিবর্তনগুলিতে [[Special:Contributions/$1|$1]]-এর তৈরি কোন নতুন পাতা নেই।',
	'nuke-list' => '[[Special:Contributions/$1|$1]] সাম্প্রতিক কালে নিচের পাতাগুলি সৃষ্টি করেছেন; একটি মন্তব্য দিন এবং বোতাম চেপে এগুলি মুছে ফেলুন।',
	'nuke-defaultreason' => '$1-এর যোগ করা পাতাগুলির গণ মুছে-ফেলা',
	'nuke-tools' => 'এই সরঞ্জামটি ব্যবহার করে আপনি একটি প্রদত্ত ব্যবহারকারীর বা আইপি ঠিকানার যোগ করা পাতাগুলি গণ আকারে মুছে ফেলতে পারবেন। পাতাগুলির তালিকা পেতে ব্যবহারকারী নাম বা আইপি ঠিকানাটি ইনপুট করুন:',
	'nuke-submit-user' => 'যাও',
	'nuke-submit-delete' => 'নির্বাচিত গুলো মুছে ফেলো',
	'nuke-select' => 'নির্বাচন: $1',
	'nuke-userorip' => 'ব্যবহারকারী নাম, আইপি ঠিকানা বা খালি:',
	'nuke-maxpages' => 'সর্বোচ্চ সংখ্যক পাতাসমূহ:',
	'nuke-multiplepeople' => 'একাধিক ব্যবহারকারী',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'nuke' => "Diverkañ a-vloc'h",
	'nuke-desc' => "Reiñ a ra an tu d'ar verourien da [[Special:Nuke|ziverkañ pajennoù a-vras]]",
	'nuke-nopages' => "Pajenn nevez ebet bet krouet gant [[Special:Contributions/$1|$1]] er c'hemmoù diwezhañ.",
	'nuke-list' => "Nevez zo eo bet krouet ar pajennoù da-heul gant [[Special:Contributions/$1|$1]];
Merkañ un tamm notenn ha klikañ war ar bouton d'o diverkañ.",
	'nuke-list-multiple' => 'Krouet e oa bet ar pajennoù da-heul nevez zo ;
Lakait un notenn ha klikit war ar bouton evit o diverkañ.',
	'nuke-defaultreason' => 'Diverkañ a-vras ar pajennoù bet ouzhpennet gant $1',
	'nuke-tools' => "Talvezout a ra an ostilh-mañ da ziverkañ a-vras pajennoù bet ouzhpennet nevez zo gant un implijer enrollet pe gant ur chomlec'h IP. 
Merkañ ar c'homlec'h IP pe anv an implijer evit kaout roll ar pajennoù da ziverkañ, pe lezel gwenn evit an holl implijerien.",
	'nuke-submit-user' => 'Mont',
	'nuke-submit-delete' => 'Dilemel ar re diuzet',
	'right-nuke' => 'Diverkañ pajennoù a-vras',
	'nuke-select' => 'Diuzañ : $1',
	'nuke-userorip' => "Anv implijer, chomlec'h IP pe gwenn :",
	'nuke-maxpages' => 'Niver brasañ a bajennoù :',
	'nuke-multiplepeople' => 'meur a implijer',
	'nuke-editby' => 'Savet gant [[Special:Contributions/$1|$1]]',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'nuke' => 'Masovno brisanje',
	'nuke-desc' => 'Daje administratorima mogućnost [[Special:Nuke|masovnog brisanja]] stranica',
	'nuke-nopages' => 'Nema novih stranica od korisnika [[Special:Contributions/$1|$1]] u nedavnim izmjenama.',
	'nuke-list' => 'Prikazane stranice su nedavno napravljenje od strane [[Special:Contributions/$1|$1]];
navedite razloge i komentare te kliknite na dugme da bi ste ih obrisali.',
	'nuke-list-multiple' => 'Slijedeće stranice su nedavno napravljene;
stavite ih u komentar i pritisnite dugme za njihovo brisanje.',
	'nuke-defaultreason' => 'Masovno uklanjanje stranica koje je dodao $1',
	'nuke-tools' => 'Ovaj alat omogućuje masovno brisanje stranica koje je nedavno dodao određeni korisnik ili IP adresa. 
Unesite korisničko ime ili IP adresu za izlistavanje stranica koje se brišu ili ostavite prazno za prikaz svih korisnika.',
	'nuke-submit-user' => 'Idi',
	'nuke-submit-delete' => 'Obriši označeno',
	'right-nuke' => 'Masovno brisanje stranica',
	'nuke-select' => 'Odaberi: $1',
	'nuke-userorip' => 'Korisničko ime, IP adresa ili ostaviti prazno:',
	'nuke-maxpages' => 'Najveći broj stranica:',
	'nuke-multiplepeople' => 'više korisnika',
	'nuke-editby' => 'Napravio [[Special:Contributions/$1|$1]]',
);

/** Catalan (Català)
 * @author Paucabot
 * @author SMP
 * @author Toniher
 */
$messages['ca'] = array(
	'nuke' => 'Eliminació massiva',
	'nuke-desc' => "Dóna als administradors l'habilitat d'[[Special:Nuke|esborrar pàgines massivament]]",
	'nuke-nopages' => 'No hi ha pàgines noves de [[Special:Contributions/$1|$1]] als canvis recents.',
	'nuke-list' => 'Les següents pàgines han estat creades recentment per [[Special:Contributions/$1|$1]];
feu un comentari i cliqueu el botó per a esborrar-les.',
	'nuke-defaultreason' => 'Esborrat massiu de pàgines creades per $1',
	'nuke-tools' => "Aquesta eina permet l'eliminació massiva de pàgines creades recentment per un usuari o IP.
Introduïu el nom d'usuari o la IP per obtenir una llista de pàgines per esborrar.",
	'nuke-submit-user' => 'Vés-hi',
	'nuke-submit-delete' => 'Esborra la selecció',
	'right-nuke' => 'Esborrar pàgines de forma massiva',
);

/** Chechen (Нохчийн)
 * @author Sasan700
 */
$messages['ce'] = array(
	'nuke' => 'Дуккха дIадайар',
	'nuke-defaultreason' => 'Декъашхочо кхоьллина агIонаш, дуккха дIайайар $1',
	'nuke-submit-delete' => 'Дlадайá хаьржнарш',
	'right-nuke' => 'дуккха агIонаш дIайайар',
);

/** Chamorro (Chamoru)
 * @author Jatrobat
 */
$messages['ch'] = array(
	'nuke-submit-user' => 'Hånao',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Jkjk
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'nuke' => 'Hromadné mazání',
	'nuke-desc' => 'Dává správcům možnost [[Special:Nuke|hromadného mazání]] stránek',
	'nuke-nopages' => 'V posledních změnách nejsou žádné nové stránky od uživatele [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Následující stránky nedávno vytvořil uživatel [[Special:Contributions/$1|$1]]; vyplňte komentář a všechny smažte kliknutím na tlačítko.',
	'nuke-list-multiple' => 'Nedávno byly vytvořeny následující stránky;
zadáním komentáře a stisknutím tlačítka je smažete.',
	'nuke-defaultreason' => 'Hromadné odstranění stránek, které vytvořil $1',
	'nuke-tools' => 'Tento nástroj umožňuje hromadné smazání stránek nedávno vytvořených zadaným uživatelem nebo IP adresou.
Zadejte uživatelské jméno nebo IP adresu, zobrazí se seznam stránek ke smazání; případně ponechte prázdné pro všechny uživatele.',
	'nuke-submit-user' => 'Provést',
	'nuke-submit-delete' => 'Smazat vybrané',
	'right-nuke' => 'Hromadné mazání stránek',
	'nuke-select' => 'Vybrat: $1',
	'nuke-userorip' => 'Uživatelské jméno, IP adresa nebo ponechte prázdné:',
	'nuke-maxpages' => 'Maximální počet stran:',
	'nuke-multiplepeople' => 'více uživatelů',
	'nuke-editby' => 'Vytvořili [[Special:Contributions/$1|$1]]',
);

/** Danish (Dansk)
 * @author Byrial
 */
$messages['da'] = array(
	'nuke' => 'Massesletning',
	'nuke-desc' => 'Giver administratorer mulighed for at [[Special:Nuke|masseslette]] sider',
	'nuke-nopages' => 'Der er ingen nye sider af [[Special:Contributions/$1|$1]] i seneste ændringer.',
	'nuke-list' => 'Følgende sider er oprettet for nylig af [[Special:Contributions/$1|$1]]; skriv en kommentar og tryk på knappen for at slette dem.',
	'nuke-defaultreason' => 'Massesletting af sider som er oprettet af $1',
	'nuke-tools' => 'Dette værktøj muliggør massesletting af sider som for nylig er oprettet af en bestemt bruger eller IP.
Skriv et brugernavn eller en IP for at få en liste over sider at slette.',
	'nuke-submit-user' => 'Udfør',
	'nuke-submit-delete' => 'Slet valgte',
	'right-nuke' => 'masseslette sider',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'nuke' => 'Massenlöschung von Seiten',
	'nuke-desc' => 'Ergänzt eine [[Special:Nuke|Spezialseite]] zur Massenlöschung von Seiten',
	'nuke-nopages' => 'Es gibt in den „Letzten Änderungen“ keine neuen Seiten von [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Die folgenden Seiten wurden von [[Special:Contributions/$1|$1]] angelegt.
Gib einen Kommentar bezüglich der Löschung an und klicke auf die Schaltfläche, um die Seiten nun zu löschen.',
	'nuke-list-multiple' => 'Die folgenden Seiten wurden vor kurzem erstellt.
Gib einen Kommentar bezüglich der Löschung an und klicke auf die Schaltfläche, um die Seiten nun zu löschen.',
	'nuke-defaultreason' => 'Massenlöschung der Seiten, die von „$1“ angelegt wurden',
	'nuke-tools' => 'Diese Arbeitshilfe ermöglicht die Massenlöschung von Seiten, die von einer IP-Adresse oder einem Benutzer angelegt wurden.
Gib die IP-Adresse oder den Benutzernamen ein, um eine Liste der zu löschenden Seiten zu erhalten. Sofern Du keine Angabe machst, werden alle Benutzer ausgewählt.',
	'nuke-submit-user' => 'Hole die Liste',
	'nuke-submit-delete' => 'Ausgewählte Seiten löschen',
	'right-nuke' => 'Massenlöschung von Seiten',
	'nuke-select' => 'Auswählen: $1',
	'nuke-userorip' => 'Benutzername, IP-Adresse oder keine Angabe:',
	'nuke-maxpages' => 'Maximale Anzahl der Seiten:',
	'nuke-multiplepeople' => 'mehrere Benutzer',
	'nuke-editby' => 'Erstellt von [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => 'Seite „$1“ wurde gelöscht.',
	'nuke-not-deleted' => "Seite [[:$1]] '''konnte nicht''' gelöscht werden.",
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 * @author Raimond Spekking
 */
$messages['de-formal'] = array(
	'nuke-list' => 'Die folgenden Seiten wurden von [[Special:Contributions/$1|$1]] angelegt.
Geben Sie einen Kommentar bezüglich der Löschung an und klicken Sie auf die Schaltfläche, um die Seiten nun zu löschen.',
	'nuke-list-multiple' => 'Die folgenden Seiten wurden vor kurzem erstellt.
Geben Sie einen Kommentar bezüglich der Löschung an und klicken Sie auf die Schaltfläche, um die Seiten nun zu löschen.',
	'nuke-tools' => 'Diese Arbeitshilfe ermöglicht die Massenlöschung von Seiten, die von einer IP-Adresse oder einem Benutzer angelegt wurden.
Geben Sie die IP-Adresse oder den Benutzernamen ein, um eine Liste der zu löschenden Seiten zu erhalten. Sofern Sie keine Angabe machen, werden alle Benutzer ausgewählt.',
);

/** Zazaki (Zazaki)
 * @author Aspar
 */
$messages['diq'] = array(
	'nuke' => 'pêropiya hewnakeno..',
	'nuke-desc' => 'Hizmetlilere, sayfaları [[Special:Nuke|kitlesel silme]] yeteneği verir',
	'nuke-nopages' => 'vuriyayişê ke hetê ıney ra [[Special:Contributions/$1|$1]] biye tede çı pelê neweyi çini .',
	'nuke-list' => 'pelê ke cêr de yê hetê ıney ra [[Special:Contributions/$1|$1]]  yew tarixo nızdi de  vıraziyayi; mışore bıkerê u qey hewnakerdışi yew tuş bıtıknê.',
	'nuke-defaultreason' => 'Mass removal of pages added by $1',
	'nuke-tools' => 'Bu araç, bir kullanıcı ya da IP tarafından yakın zamanda eklenen sayfaların kitlesel silinmelerine izin verir.
Silinecek sayfaların listesini almak için kullanıcı adını ya da IPyi girin.',
	'nuke-submit-user' => 'şo',
	'nuke-submit-delete' => 'nişanbiyayeyi hewnaker',
	'right-nuke' => 'pelan yew hew de hewnaker',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'nuke' => 'Masowe lašowanje',
	'nuke-desc' => 'Zmóžnja admininistratoram boki [[Special:Nuke|z masami lašowaś]]',
	'nuke-nopages' => 'Žedne nowe boki wót [[Special:Contributions/$1|$1]] w aktualnych změnach',
	'nuke-list' => 'Slědujuce boki su se nowo napórali wót [[Special:Contributions/$1|$1]];
zapódaj komentar a klikni na tłocašk, aby je lašował.',
	'nuke-list-multiple' => 'Slědujuce boki su se rowno napórali;
zapódaj komentar a klikni na tłocašk, aby je wulašował.',
	'nuke-defaultreason' => 'Masowe lašowanje bokow, kótarež $1 jo pśidał.',
	'nuke-tools' => 'Toś ten rěd zmóžnja masowe lašowanja bokow, kótarež wěsty wužywaŕ abo IP jo rowno pśidał. Zapódaj wužywarske mě abo IP-adresu, aby dostał lisćinu bokow, kótarež maju se lašowaś abo wóstaj pólo prozne, aby wubrał wšych wužywarjow.',
	'nuke-submit-user' => 'W pórěźe',
	'nuke-submit-delete' => 'Wubrane wulašowaś',
	'right-nuke' => 'Boki z masami lašowaś',
	'nuke-select' => 'Wubraś: $1',
	'nuke-userorip' => 'Wužywarske mě, IP-adresa abo žedno pódaśe:',
	'nuke-maxpages' => 'Maksimalna licba bokow:',
	'nuke-multiplepeople' => 'někotare wužywarje',
	'nuke-editby' => 'Napórany wót [[Special:Contributions/$1|$1]]',
);

/** Ewe (Eʋegbe) */
$messages['ee'] = array(
	'nuke-submit-user' => 'Yi',
);

/** Greek (Ελληνικά)
 * @author Dead3y3
 * @author ZaDiak
 */
$messages['el'] = array(
	'nuke' => 'Μαζική διαγραφή',
	'nuke-desc' => 'Δίνει στους διαχειριστές την ικανότητα να [[Special:Nuke|διαγράφουν μαζικά]] σελίδες',
	'nuke-nopages' => 'Καμία νέα σελίδα από τον/την [[Special:Contributions/$1|$1]] στις πρόσφατες αλλαγές.',
	'nuke-list' => 'Οι ακόλουθες σελίδες δημιουργήθηκαν προσφατα από τον/την [[Special:Contributions/$1|$1]]·
βάλτε ένα σχόλιο και πατήστε το κουμπί για να τις διαγράψετε.',
	'nuke-defaultreason' => 'Μαζική αφαίρεση σελίδων προστιθέμενων από τον/την $1',
	'nuke-tools' => 'Αυτό το εργαλείο επιτρέπει μαζικές διαγραφές σελίδων πρόσφατα προστιθέμενων από έναν δοσμέ-νο/νη χρήστ-η/ρια ή IP.<br />
Εισάγετε το όνομα χρήστ-η/ριας ή την IP για να πάρετε έναν κατάλογο με σελίδες προς διαγραφή.',
	'nuke-submit-user' => 'Πήγαινε',
	'nuke-submit-delete' => 'Διαγραφή επιλεγμένων',
	'right-nuke' => 'Μαζική διαγραφή σελίδων',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'nuke' => 'Amasforigi',
	'nuke-desc' => 'Rajtigas al administrantoj la kapablon [[Special:Nuke|amasforigi]] paĝojn',
	'nuke-nopages' => 'Neniuj novaj paĝoj de [[Special:Contributions/$1|$1]] en lastaj ŝanĝoj.',
	'nuke-list' => 'La jenaj paĝoj estis lastatempe kreitaj de [[Special:Contributions/$1|$1]];
aldonu komenton kaj klaku la butonon forigi ilin.',
	'nuke-defaultreason' => 'Amasforigo de paĝoj aldonita de $1',
	'nuke-tools' => 'Ĉi tiu ilo ebligas amasforigojn da paĝoj lastatempe aldonitaj de aparta uzanto aŭ IP-adreso.
Enigu la salutnomon aŭ IP-adreson por akiri liston de paĝoj forigi, aŭ lasu ĝin malplena por ĉiuj uzantoj.',
	'nuke-submit-user' => 'Ek!',
	'nuke-submit-delete' => 'Forigi elekton',
	'right-nuke' => 'Amasforigi paĝojn',
	'nuke-select' => 'Elektu: $1',
	'nuke-userorip' => 'Salutnomo, IP-adreso, aŭ nenio:',
	'nuke-maxpages' => 'Maksimuma nombro de paĝoj:',
	'nuke-multiplepeople' => 'multaj uzantoj',
	'nuke-editby' => 'Kreita de [[Special:Contributions/$1|$1]]',
);

/** Spanish (Español)
 * @author Aleator
 * @author Crazymadlover
 * @author Dferg
 * @author Jatrobat
 * @author Remember the dot
 * @author Sanbec
 */
$messages['es'] = array(
	'nuke' => 'Borrado en masa',
	'nuke-desc' => 'Da a los administradores la posibilidad de [[Special:Nuke|borrar páginas de forma masiva]]',
	'nuke-nopages' => 'No hay páginas nuevas de [[Special:Contributions/$1|$1]] en los cambios recientes.',
	'nuke-list' => '[[Special:Contributions/$1|$1]] creó recientemente las siguientes páginas;
escriba un comentario y haga clic en el botón para borrarlas.',
	'nuke-defaultreason' => 'Eliminación en masa de páginas añadidas por $1',
	'nuke-tools' => 'Esta herramienta permite borrados masivos de páginas creadas recientemente por un usuario o una dirección IP.
Introduzca el nombre de usuario o la dirección IP para obtener la lista de páginas a borrar, o déjelo en blanco para todos los usuarios.',
	'nuke-submit-user' => 'Ir',
	'nuke-submit-delete' => 'Borrar lo seleccionado',
	'right-nuke' => 'Borrar páginas masivamente',
);

/** Estonian (Eesti)
 * @author Pikne
 */
$messages['et'] = array(
	'nuke' => 'Lauskustutamine',
	'nuke-desc' => 'Võimaldab ülematel lehekülgede [[Special:Nuke|lauskustutamist]].',
	'nuke-nopages' => 'Viimaste muudatuste all pole uusi kasutaja [[Special:Contributions/$1|$1]] loodud lehekülgi.',
	'nuke-list' => 'Kasutaja [[Special:Contributions/$1|$1]] on hiljuti loonud järgnevad leheküljed. Enne kustutamist sisesta kommentaar.',
	'nuke-defaultreason' => 'Kasutaja $1 lisatud lehekülgede lauseemaldamine',
	'nuke-tools' => 'See tööriist võimaldab ülesantud kasutaja või IP-aadressi lisatud leheküljed lauskustutada.
Kustutatavate lehekülgede nimekirja näitamiseks sisesta kasutajanimi või IP-aadress.',
	'nuke-submit-user' => 'Mine',
	'nuke-submit-delete' => 'Kustuta väljavalitud',
	'right-nuke' => 'Lehekülgi lauskustutada',
);

/** Basque (Euskara)
 * @author Theklan
 * @author Unai Fdz. de Betoño
 */
$messages['eu'] = array(
	'nuke' => 'Ezabaketa masiboa',
	'nuke-nopages' => 'Aldaketa berrietan ez dago [[Special:Contributions/$1|$1]](r)en orri berririk.',
	'nuke-defaultreason' => '$1(e)k sortutako orrien ezabaketa masiboa',
	'nuke-submit-user' => 'Joan',
	'nuke-submit-delete' => 'Aukeratutakoa ezabatu',
	'right-nuke' => 'Masiboki ezabatutako orrialdeak',
);

/** Persian (فارسی)
 * @author Huji
 */
$messages['fa'] = array(
	'nuke' => 'حذف دسته‌جمعی',
	'nuke-desc' => 'به مدیران امکان [[Special:Nuke|حذف دسته‌جمعی]] صفحه‌ها را می‌دهد',
	'nuke-nopages' => 'صفحه‌ٔ جدیدی از [[Special:Contributions/$1|$1]] در تغییرات اخیر وجود ندارد.',
	'nuke-list' => 'صفحه‌های زیر به تازگی توسط [[Special:Contributions/$1|$1]] ایجاد شده‌اند؛ توضیحی ارائه کنید و دکمه را بزنید تا این صحفه‌ها حذف شوند.',
	'nuke-defaultreason' => 'حذف دسته‌جمعی صفحه‌هایی که توسط $1 ایجاد شده‌اند',
	'nuke-tools' => 'این ابزار امکان حذف دسته‌جمعی صفحه‌هایی که به تازگی توسط یک کاربر یا نشانی آی‌پی اضافه شده‌اند را فراهم می‌کند.
نام کاربری یا نشانی آی‌پی موردنظر را وارد کنید، یا جعبه را خالی بگذارید تا تمام کاربرها در نظر گرفته شوند.',
	'nuke-submit-user' => 'برو',
	'nuke-submit-delete' => 'حذف موارد انتخاب شده',
	'right-nuke' => 'حذف دسته‌جمعی صفحه‌ها',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Jaakonam
 */
$messages['fi'] = array(
	'nuke' => 'Massapoisto',
	'nuke-desc' => 'Mahdollistaa ylläpitäjille sivujen [[Special:Nuke|massapoistamisen]].',
	'nuke-nopages' => 'Ei käyttäjän [[Special:Contributions/$1|$1]] lisäämiä uusia sivuja tuoreissa muutoksissa.',
	'nuke-list' => 'Käyttäjä [[Special:Contributions/$1|$1]] on äskettäin luonut seuraavat sivut.',
	'nuke-defaultreason' => 'Käyttäjän $1 lisäämien sivujen massapoistaminen',
	'nuke-tools' => 'Tämä työkalu mahdollistaa äskettäin lisättyjen sivujen massapoistamisen käyttäjänimen tai IP-osoitteen perusteella.
Kirjoita käyttäjänimi tai IP-osoite, niin saat listan poistettavista sivuista.',
	'nuke-submit-user' => 'Siirry',
	'nuke-submit-delete' => 'Poista valitut',
	'right-nuke' => 'Massapoistaa sivuja',
	'nuke-select' => 'Valitse: $1',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author Jean-Frédéric
 * @author Louperivois
 * @author Peter17
 * @author Sherbrooke
 * @author Zetud
 */
$messages['fr'] = array(
	'nuke' => 'Suppression en masse',
	'nuke-desc' => 'Donne la possibilité aux administrateurs de [[Special:Nuke|supprimer en masse]] des pages',
	'nuke-nopages' => 'Aucune nouvelle page créée par [[Special:Contributions/$1|$1]] dans la liste des changements récents.',
	'nuke-list' => 'Les pages suivantes ont été créées récemment par [[Special:Contributions/$1|$1]]; Indiquer un commentaire et cliquer sur le bouton pour les supprimer.',
	'nuke-list-multiple' => 'Les pages suivantes ont été récemment créées ; 
entrez un commentaire et cliquez sur le bouton pour les supprimer.',
	'nuke-defaultreason' => 'Suppression en masse des pages ajoutées par $1',
	'nuke-tools' => 'Cet outil permet les suppressions en masse des pages ajoutées récemment par un utilisateur enregistré ou par une adresse IP. Indiquer l’adresse IP afin d’obtenir la liste des pages à supprimer, ou laisser blanc pour tous les utilisateurs.',
	'nuke-submit-user' => 'Valider',
	'nuke-submit-delete' => 'Supprimer la sélection',
	'right-nuke' => 'Supprimer des pages en masse',
	'nuke-select' => 'Sélectionnez : $1',
	'nuke-userorip' => "Nom d'utilisateur, adresse IP ou vide :",
	'nuke-maxpages' => 'Nombre maximal de pages :',
	'nuke-multiplepeople' => 'plusieurs utilisateurs',
	'nuke-editby' => 'Créé par [[Special:Contributions/$1|$1]]',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'nuke' => 'Suprèssion en massa',
	'nuke-desc' => 'Balye la possibilitât ux administrators de [[Special:Nuke|suprimar en massa]] des pâges.',
	'nuke-nopages' => 'Gins de pâge novèla fêta per [[Special:Contributions/$1|$1]] dens la lista des dèrriérs changements.',
	'nuke-list' => 'Cetes pâges ont étâ fêtes dèrriérement per [[Special:Contributions/$1|$1]] ;
buchiéd un comentèro et pués clicâd sur lo boton por les suprimar.',
	'nuke-defaultreason' => 'Suprèssion en massa de les pâges apondues per $1',
	'nuke-tools' => 'Ceti outil pèrmèt les suprèssions en massa de les pâges apondues dèrriérement per un utilisator encartâ ou ben per una adrèce IP.
Buchiér lo nom d’utilisator ou ben l’adrèce IP por avêr la lista de les pâges a suprimar, ou ben lèssiér blanc por tôs los utilisators.',
	'nuke-submit-user' => 'Validar',
	'nuke-submit-delete' => 'Suprimar lo chouèx',
	'right-nuke' => 'Suprimar des pâges en massa',
	'nuke-select' => 'Chouèsésséd : $1',
	'nuke-userorip' => 'Nom d’utilisator, adrèce IP ou ben vouedo :',
	'nuke-multiplepeople' => 'un mouél d’utilisators',
	'nuke-editby' => 'Fêt per [[Special:Contributions/$1|$1]]',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'nuke-submit-user' => 'Va',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'nuke' => 'Eliminar en masa',
	'nuke-desc' => 'Dá aos administradores a posibilidade de [[Special:Nuke|borrar páxinas]] masivamente',
	'nuke-nopages' => 'Non hai novas páxinas feitas por [[Special:Contributions/$1|$1]] nos cambios recentes.',
	'nuke-list' => '[[Special:Contributions/$1|$1]] creou nos últimos intres as seguintes páxinas;
escriba un comentario e prema o botón para borralas.',
	'nuke-list-multiple' => 'As seguintes páxinas creáronse recentemente;
insira un comentario e prema o botón para borralas.',
	'nuke-defaultreason' => 'Eliminación en masa das páxinas engadidas por $1',
	'nuke-tools' => 'Esta ferramenta permite borrar en masa as páxinas engadidas recentemente por un determinado usuario ou enderezo IP.
Introduza o nome do usuario ou enderezo IP para obter unha lista das páxinas para borrar. Déixeo en branco para todos os usuarios.',
	'nuke-submit-user' => 'Adiante',
	'nuke-submit-delete' => 'Eliminar o seleccionado',
	'right-nuke' => 'Borrar páxinas masivamente',
	'nuke-select' => 'Seleccionar: $1',
	'nuke-userorip' => 'Nome de usuario, enderezo IP ou en branco:',
	'nuke-maxpages' => 'Número máximo de páxinas:',
	'nuke-multiplepeople' => 'varios usuarios',
	'nuke-editby' => 'Creado por [[Special:Contributions/$1|$1]]',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'nuke' => 'Μαζικὴ διαγραφή',
	'nuke-desc' => 'Δίδει τοῖς γέρουσι τὴν ἱκανότητα [[Special:Nuke|μαζικῆς διαγραφῆς]] δέλτων.',
	'nuke-nopages' => 'Οὐδεμία νέα δέλτος ὑπὸ τοῦ [[Special:Contributions/$1|$1]] ἐν ταῖς προσφάτοις ἀλλαγαῖς.',
	'nuke-list' => 'Αἱ ἀκόλουθοι δέλτοι προσφάτως ἐποιήθησαν ὑπὸ τοῦ/τῆς [[Special:Contributions/$1|$1]]·
ἐναπόθου σχόλιόν τι καὶ πίεσον τὸ κομβίον ἵνα διαγράψῃς αὗται.',
	'nuke-defaultreason' => 'Μαζικὴ ἀφαίρεσις δέλτων προστεθειμένων ὑπὸ τοῦ $1',
	'nuke-tools' => 'Τόδε τὸ ἐργαλεῖον ἐπιτρέπει τὰν μαζικὰν διαγραφὰς δἐλτων προσφάτως προστεθειμένων ἐξ ἑνὸς δεδομένου χρωμένου ἢ ἑνὸς IP (Διαδικτυακοῦ Πρωτοκόλλου).
Ἔξεστί σοι εἰσάξειν τὸ ὀνοματεῖον ἢ τὸ IP ἵνα λάβῃς μίαν καταλογὴν διαγραπτέων δέλτων.',
	'nuke-submit-user' => 'Ἱέναι',
	'nuke-submit-delete' => 'Διαγράφειν τὴν ἐπειλεγμένην',
	'right-nuke' => 'Μαζικὴ διαγραφὴ δέλτων',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'nuke' => 'Masseleschig',
	'nuke-desc' => 'Git Ammanne d Megligkeit fir e [[Special:Nuke|Masseleschig]] vu Syte',
	'nuke-nopages' => 'In dr Letschte Änderige het s kei neije Syte vu [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Die Syte sin vu [[Special:Contributions/$1|$1]] aagleit wore;
gib e Kommentar yy un druck uf dr Leschchnopf.',
	'nuke-list-multiple' => 'Die Syte sin vor churzem aagleit wore.
Schryb e Kommentar un druck uf dr Chnopf go si lesche.',
	'nuke-defaultreason' => 'Masseleschig vu Syte, wu vu „$1“ aagleit wore sin',
	'nuke-tools' => 'Des Wärchzyyg git d Megligkeit fir e Masseleschig vu Syte, wu vun ere IP-Adräss oder vun eme Benutzer aagleit wore sin. Gib d IP-Adräss/dr Benutzername yy fir ne Lischt z iberchu. Wänn du kei Aagab machsch, wäre alli Benutzer uusgwehlt.',
	'nuke-submit-user' => 'Hol Lischt',
	'nuke-submit-delete' => 'Lesche',
	'right-nuke' => 'Masseleschig vu Syte',
	'nuke-select' => 'Uuswehle: $1',
	'nuke-userorip' => 'Benutzername, IP-Adräss oder kei Aagab:',
	'nuke-maxpages' => 'Maximali Sytezahl:',
	'nuke-multiplepeople' => 'mehreri Benutzer',
	'nuke-editby' => 'Aagleit vu [[Special:Contributions/$1|$1]]',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'nuke-submit-user' => 'Gow',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotem Liss
 * @author YaronSh
 */
$messages['he'] = array(
	'nuke' => 'מחיקה מרובה',
	'nuke-desc' => 'אפשרות למפעילי המערכת לבצע [[Special:Nuke|מחיקה מרובה]] של דפים',
	'nuke-nopages' => 'אין דפים חדשים שנוצרו על ידי [[Special:Contributions/$1|$1]] in בשינויים האחרונים.',
	'nuke-list' => 'הדפים הבאים נוצרו לאחרונה על ידי [[Special:Contributions/$1|$1]];
אנא כתבו נימוק למחיקה ולחצו על הכפתור כדי למחוק אותם.',
	'nuke-list-multiple' => 'הדפים הבאים נוצרו לאחרונה;
אנא כתבו נימוק למחיקה ולחצו על הכפתור כדי למחוק אותם.',
	'nuke-defaultreason' => 'הסרה מרובה של דפים שנוספו על ידי $1',
	'nuke-tools' => 'כלי זה מאפשר מחיקות המוניות של דפים שנוספו לאחרונה על ידי משתמש או כתובת IP מסוימים.
כתבו את שם המשתמש או כתובת ה־IP כדי לקבל את רשימת הדפים למחיקה או השאירו את השדה הזה ריק עבור כל המשתמשים.',
	'nuke-submit-user' => 'הצגה',
	'nuke-submit-delete' => 'מחיקת הדפים שנבחרו',
	'right-nuke' => 'מחיקה מרובה של דפים',
	'nuke-select' => 'בחירה: $1',
	'nuke-userorip' => 'שם משתמש, כתובת IP או ריק:',
	'nuke-maxpages' => 'מספר מרבי של דפים:',
	'nuke-multiplepeople' => 'משתמשים מרובים',
	'nuke-editby' => 'נוצר על ידי [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "הדף '''$1''' נמחק.",
	'nuke-not-deleted' => "'''לא ניתן''' למחוק את הדף [[:$1]].",
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 * @author Shyam
 */
$messages['hi'] = array(
	'nuke' => 'एकसाथ बहुत सारे पन्ने हटायें',
	'nuke-desc' => 'प्रबंधकोंको एकसाथ [[Special:Nuke|बहुत सारे पन्ने हटानेकी]] अनुमति देता हैं',
	'nuke-nopages' => 'हाल में हुए बदलावोंमें [[Special:Contributions/$1|$1]] द्वारा नये पन्ने नहीं हैं।',
	'nuke-list' => 'नीचे दिये हुए पन्ने [[Special:Contributions/$1|$1]] ने हाल में बनायें हैं; टिप्पणी दें और हटाने के लिये बटनपर क्लिक करें।',
	'nuke-defaultreason' => '$1 ने बनाये हुए पन्ने एकसाथ हटायें',
	'nuke-tools' => 'यह उपकरण किसी सदस्य या IP द्वारा हाल ही में जोड़े गए पृष्ठों को सामूहिक रूप से हटाने में सहायक है।
सदस्यनाम या IP डालकर हटाने वाले पृष्ठों की सूची प्राप्त करें।',
	'nuke-submit-user' => 'जायें',
	'nuke-submit-delete' => 'चुने हुए हटायें',
	'right-nuke' => 'बहुतसे पन्ने एकसाथ हटायें',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 */
$messages['hil'] = array(
	'nuke-submit-user' => 'Lakat',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author Dnik
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'nuke' => 'Skupno brisanje',
	'nuke-desc' => 'Daje administratorima mogućnost [[Special:Nuke|skupnog brisanja]] stranica',
	'nuke-nopages' => 'Nema novih stranica suradnika [[Special:Contributions/$1|$1]] među nedavnim promjenama.',
	'nuke-list' => 'Slijedeće stranice je stvorio suradnik [[Special:Contributions/$1|$1]]; napišite zaključak i kliknite gumb za njihovo brisanje.',
	'nuke-defaultreason' => 'Skupno brisanje stranica suradnika $1',
	'nuke-tools' => 'Ova ekstenzija omogućava skupno brisanje stranica (članaka) nekog prijavljenog ili neprijavljenog suradnika. Upišite ime ili IP adresu za dobivanje popisa stranica koje je moguće obrisati:',
	'nuke-submit-user' => 'Kreni',
	'nuke-submit-delete' => 'Obriši označeno',
	'right-nuke' => 'Skupno brisanje stranica',
	'nuke-select' => 'Odaberite: $1',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'nuke' => 'Masowe wušmórnjenje',
	'nuke-desc' => 'Zmóžnja administratoram [[Special:Nuke|masowe wušmórnjenje]] stronow',
	'nuke-nopages' => 'W poslednich změnach njejsu nowe strony z [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Slědowace strony buchu runje přez [[Special:Contributions/$1|$1]] wutworjene; zapodaj komentar a klikń na tłóčatko wušmórnjenja.',
	'nuke-list-multiple' => 'Slědowace strony su so runje wutowrili;
napisaj komentar a klikń na tłóčatko, zo by je wušmórnył.',
	'nuke-defaultreason' => 'Masowe wušmórnjenje stronow, kotrež buchu wot $1 wutworjene',
	'nuke-tools' => 'Tutón grat zmóžnja masowe wušmórnjenje stronow, kotrež buchu wot IP-adresy abo wužiwarja přidate. Zapodaj IP-adresu abo wužiwarske mjeno, zo by lisćinu stronow dóstał, kotrež maja so wušmórnyć.',
	'nuke-submit-user' => 'W porjadku',
	'nuke-submit-delete' => 'Wušmórnyć',
	'right-nuke' => 'Masowe zničenje stronow',
	'nuke-select' => 'Wubrać: $1',
	'nuke-userorip' => 'Wužiwar, IP abo prózdny:',
	'nuke-maxpages' => 'Maksimalna ličba stronow:',
	'nuke-multiplepeople' => 'wjacori ludźo',
	'nuke-editby' => 'Wutworjeny wot [[Special:Contributions/$1|$1]]',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Dorgan
 * @author KossuthRad
 */
$messages['hu'] = array(
	'nuke' => 'Halmozott törlés',
	'nuke-desc' => 'Lehetővé teszi az adminisztrátorok számára a lapok [[Special:Nuke|tömeges törlését]].',
	'nuke-nopages' => 'Nincsenek új oldalak [[Special:Contributions/$1|$1]] az aktuális események között.',
	'nuke-list' => 'Az alábbi lapokat nem rég készítette [[Special:Contributions/$1|$1]]; adj meg egy indoklást, és kattints a gombra a törlésükhöz.',
	'nuke-defaultreason' => '$1 által készített lapok tömeges eltávolítása',
	'nuke-tools' => 'Ez az eszköz lehetővé teszi egy adott felhasználó vagy IP által nem rég készített lapok tömeges törlését. Add meg a felhasználónevet vagy az IP-címet, hogy lekérd a törlendő lapok listáját:',
	'nuke-submit-user' => 'Menj',
	'nuke-submit-delete' => 'Kijelöltek törlése',
	'right-nuke' => 'oldalak tömeges törlése',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'nuke' => 'Deletion in massa',
	'nuke-desc' => 'Da le possibilitate al administratores de [[Special:Nuke|deler paginas in massa]]',
	'nuke-nopages' => 'Nulle nove paginas per [[Special:Contributions/$1|$1]] trovate in le modificationes recente.',
	'nuke-list' => 'Le sequente paginas esseva recentemente create per [[Special:Contributions/$1|$1]];
entra un commento e clicca le button pro deler los.',
	'nuke-list-multiple' => 'Le sequente paginas esseva create recentemente;
entra un commento e pulsa sur le button pro deler los.',
	'nuke-defaultreason' => 'Deletion in massa de paginas addite per $1',
	'nuke-tools' => 'Iste instrumento permitte le deletion in massa de paginas recentemente addite per un usator o adresse IP specific.
Entra le nomine de usator o adresse IP pro obtener un lista de paginas a deler, o lassa vacue pro tote le usatores.',
	'nuke-submit-user' => 'Ir',
	'nuke-submit-delete' => 'Deler selection',
	'right-nuke' => 'Deler paginas in massa',
	'nuke-select' => 'Seliger: $1',
	'nuke-userorip' => 'Nomine de usator, adresse IP o vacue:',
	'nuke-maxpages' => 'Numero maxime de paginas:',
	'nuke-multiplepeople' => 'multiple usatores',
	'nuke-editby' => 'Create per [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Le pagina '''$1''' ha essite delite.",
	'nuke-not-deleted' => "Le pagina [[:$1]] '''non poteva''' esser delite.",
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author IvanLanin
 * @author Rex
 */
$messages['id'] = array(
	'nuke' => 'Penghapusan massal',
	'nuke-desc' => 'Memberikan kemampuan bagi pengurus untuk [[Special:Nuke|menghapus halaman secara massal]]',
	'nuke-nopages' => 'Tak ditemukan halaman baru dari [[Special:Contributions/$1|$1]] di perubahan terbaru.',
	'nuke-list' => 'Halaman berikut baru saja dibuat oleh [[Special:Contributions/$1|$1]]; masukkan suatu komentar dan tekan tombol untuk menghapus halaman-halaman tersebut.',
	'nuke-list-multiple' => 'Halaman berikut baru dibuat; 
masukkan suatu komentar dan tekan tombol untuk menghapus.',
	'nuke-defaultreason' => 'Penghapusan massal halaman-halaman yang dibuat oleh $1',
	'nuke-tools' => 'Alat ini memungkinkan penghapusan massal halaman-halaman yang baru saja dibuat oleh seorang pengguna atau IP.
Masukkan nama pengguna atau IP untuk mendapat daftar halaman yang dapat dihapus atau kosongkan untuk daftar halaman dari semua pengguna.',
	'nuke-submit-user' => 'Tuju ke',
	'nuke-submit-delete' => 'Hapus yang terpilih',
	'right-nuke' => 'Melakukan penghapusan masal halaman',
	'nuke-select' => 'Pilih: $1',
	'nuke-userorip' => 'Nama pengguna, alamat IP, atau kosong:',
	'nuke-maxpages' => 'Jumlah maksimum halaman:',
	'nuke-multiplepeople' => 'beberapa pengguna',
	'nuke-editby' => 'Dibuat oleh [[Special:Contributions/$1|$1]]',
);

/** Igbo (Igbo)
 * @author Ukabia
 */
$messages['ig'] = array(
	'nuke-submit-user' => 'Gá',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'nuke-submit-user' => 'Irar',
	'nuke-submit-delete' => 'Efacez selektiti',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'nuke' => 'Fjöldaeyða',
	'nuke-submit-user' => 'Áfram',
);

/** Italian (Italiano)
 * @author .anaconda
 * @author Beta16
 * @author BrokenArrow
 * @author Darth Kule
 */
$messages['it'] = array(
	'nuke' => 'Cancellazione di massa',
	'nuke-desc' => 'Consente agli amministratori la [[Special:Nuke|cancellazione in massa]] delle pagine',
	'nuke-nopages' => 'Non sono state trovate nuove pagine create da [[Special:Contributions/$1|$1]] tra le modifiche recenti.',
	'nuke-list' => 'Le seguenti pagine sono state create di recente da [[Special:Contributions/$1|$1]]; inserisci un commento e conferma la cancellazione.',
	'nuke-list-multiple' => 'Le seguenti pagine sono state create recentemente;
inserisci un commento e premi il pulsante per cancellarle.',
	'nuke-defaultreason' => 'Cancellazione di massa delle pagine create da $1',
	'nuke-tools' => "Questo strumento permette la cancellazione in massa delle pagina create di recente da un determinato utente registrato o anonimo (IP).
Inserisci il nome utente o l'indirizzo IP per la lista delle pagine da cancellare, oppure lascia vuoto per tutti gli utenti.",
	'nuke-submit-user' => 'Vai',
	'nuke-submit-delete' => 'Cancella la selezione',
	'right-nuke' => 'Cancella pagine in massa',
	'nuke-select' => 'Seleziona: $1',
	'nuke-userorip' => 'Nome utente, indirizzo IP o vuoto:',
	'nuke-maxpages' => 'Numero massimo di pagine:',
	'nuke-multiplepeople' => 'più utenti',
	'nuke-editby' => 'Creato da [[Special:Contributions/$1|$1]]',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fievarsty
 * @author Hosiryuhosi
 * @author JtFuruhata
 * @author Muttley
 * @author Ohgi
 * @author 青子守歌
 */
$messages['ja'] = array(
	'nuke' => 'まとめて削除',
	'nuke-desc' => '{{int:group-sysop}}がページを[[Special:Nuke|まとめて削除]]できるようにする',
	'nuke-nopages' => '最近の更新ページに[[Special:Contributions/$1|$1]]が新規作成したページはありません。',
	'nuke-list' => '以下は、[[Special:Contributions/$1|$1]] によって最近作成されたページの一覧です。理由を記入しボタンを押すと、一気に削除されます。',
	'nuke-list-multiple' => '最近作成されたページが表示されています。
コメントを入力し、ボタンを押すと、削除されます。',
	'nuke-defaultreason' => '$1 によって加えられたページを一括して削除',
	'nuke-tools' => 'このツールを使うと、指定した利用者またはIPアドレスによって最近作成されたページを、まとめて削除することができます。
利用者名またはIPアドレスを入力すると、削除対象ページの一覧が生成されます。空にすると、すべての利用者によるものが対象になります。',
	'nuke-submit-user' => '一覧取得',
	'nuke-submit-delete' => '選択されたページを削除',
	'right-nuke' => 'ページの一括削除',
	'nuke-select' => '選択：$1',
	'nuke-userorip' => '利用者名、IPアドレスまたは空白:',
	'nuke-maxpages' => 'ページの最大量:',
	'nuke-multiplepeople' => '複数の利用者',
	'nuke-editby' => '[[Special:Contributions/$1|$1]]によって作成',
);

/** Jutish (Jysk)
 * @author Huslåke
 */
$messages['jut'] = array(
	'nuke' => 'Massa slettenge',
	'nuke-desc' => 'Gæv administråtårer æ mågleghed til [[Special:Nuke|massa slette]] pæge',
	'nuke-nopages' => 'Ekke ny pæge til [[Special:Contributions/$1|$1]] i seneste ændrenger.',
	'nuke-list' => 'Æ følgende pæger åorte ræsentleg skep via [[Special:Contributions/$1|$1]]; set i en bemærkenge og slå æ knup til sletter hun.',
	'nuke-defaultreason' => 'Massa sletterenge der pæger skep via $1',
	'nuke-tools' => 'Dette tool gæv men æ mågleghed før massa sletterenge der pæges ræsentleg skeppen via æ gæven bruger æller IP. Input æ brugernavn æller IP til kriige æ liste der pæges til sletterenge:',
	'nuke-submit-user' => 'Gå',
	'nuke-submit-delete' => 'Sletterenge sælektærn',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'nuke' => 'Busak massal',
	'nuke-desc' => 'Mènèhi opsis fungsionalitas kanggo [[Special:Nuke|mbusak massal]] kaca-kaca',
	'nuke-nopages' => 'Ora ditemokaké kaca anyar saka [[Special:Contributions/$1|$1]] ing owah-owahan pungkasan.',
	'nuke-list' => 'Kaca-kaca ing ngisor iki lagi baé digawé déning [[Special:Contributions/$1|$1]];
lebokna komentar lan pencèten tombol kanggo mbusak kabèh.',
	'nuke-defaultreason' => 'Pambusakan massal kaca-kaca sing digawé déning $1',
	'nuke-tools' => 'Piranti iki bisa ngakibataké pambusakan massal kaca-kaca sing lagi waé ditambahaké déning sawijining panganggo utawa alamat IP.
Lebokna jeneng panganggo utawa alamat IP kanggo olèh daftar kaca-kaca sing bisa dibusak:',
	'nuke-submit-user' => 'Lakokna',
	'nuke-submit-delete' => 'Busaken sing kapilih',
	'right-nuke' => 'Pambusakan masal',
);

/** Georgian (ქართული)
 * @author Alsandro
 * @author BRUTE
 * @author Dawid Deutschland
 * @author Sopho
 */
$messages['ka'] = array(
	'nuke' => 'მასობრივი წაშლა',
	'nuke-desc' => 'ადმინისტრატორებს აძლევს გვერდების [[Special:Nuke|მასობრივად წაშლის]] საშუალებას',
	'nuke-nopages' => 'ბოლო ცვლილებებში არ არის ახალი გვერდები [[Special:Contributions/$1|$1]]-ის მიერ.',
	'nuke-list' => 'ეს გვერდები შეიქმნა [[Special:Contributions/$1|$1]]-ის მიერ;
შეიყვანეთ კომენტარი და დააჭირეთ ღილაკს მათ წასაშლელად.',
	'nuke-defaultreason' => '$1-ის მიერ დამატებული გვერდების მასობრივი წაშლა',
	'nuke-tools' => 'ეს გვერდი გაძლევთ ნებისმიერი მომხმარებლის ან IP მისამართის მიერ დამატებული გვერდების ერთბაშად წაშლის საშუალებას.
შეიყვანეთ მომხმარებლის სახელი ან IP მისამართი მის მიერ დამატებული გვერდების სიის მისაღებად.',
	'nuke-submit-user' => 'გადასვლა',
	'nuke-submit-delete' => 'არჩეულის წაშლა',
	'right-nuke' => 'გვერდების მასობრივად წაშლა',
	'nuke-select' => 'აირჩიეთ: $1',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'nuke' => 'លុបចេញ​ជាខ្សែ',
	'nuke-desc' => 'ផ្តល់លទ្ធភាព​ឱ្យ​អ្នកថែទាំប្រព័ន្ធ [[Special:Nuke|លុបចេញ​ជាខ្សែ]] ទំព័រនានា',
	'nuke-nopages' => 'គ្មាន​ទំព័រ​ថ្មី [[Special:Contributions/$1|$1]] ក្នុង​បំលាស់ប្តូរ​ថ្មីៗ​។',
	'nuke-list' => 'ទំព័រទាំងនេះ ទើបតែ​ត្រូវ​បាន​បង្កើត ដោយ [[Special:Contributions/$1|$1]]; សូម​ដាក់​ហេតុផល និង​ចុច​ប្រអប់​ដើម្បី​លុបចេញ​ពួកវា​។',
	'nuke-defaultreason' => 'ការដកចេញ​ជាខ្សែ នៃ​ទំព័រ​បានបន្ថែម​ដោយ $1',
	'nuke-tools' => 'ឧបករណ៍​នេះ អនុញ្ញាត​លុបចេញ​ជាខ្សែ​នូវ​ទំព័រ​ទើប​បាន​បន្ថែម​ថ្មីៗ ដោយ​អ្នកប្រើប្រាស់​បាន​ចុះ​ឈ្មោះ ឬ ដោយ​អាសយដ្ឋាន IP ។ សូម​បញ្ចូល​អត្តនាមអ្នកប្រើប្រាស់ ឬ អាសយដ្ឋាន IP ដើម្បី​មាន​បញ្ជីទំព័រ​សម្រាប់​លុប​៖',
	'nuke-submit-user' => 'ទៅ',
	'nuke-submit-delete' => 'លុបចេញ ជម្រើសយក',
);

/** Kannada (ಕನ್ನಡ)
 * @author Nayvik
 */
$messages['kn'] = array(
	'nuke-submit-user' => 'ಹೋಗು',
);

/** Korean (한국어)
 * @author Albamhandae
 * @author Klutzy
 * @author Kwj2772
 * @author ToePeu
 */
$messages['ko'] = array(
	'nuke' => '문서 대량 삭제',
	'nuke-desc' => '관리자가 문서를 [[Special:Nuke|대량 삭제]]할 수 있는 기능을 추가합니다.',
	'nuke-nopages' => '최근에 [[Special:Contributions/$1|$1]] 사용자가 만든 문서가 없습니다.',
	'nuke-list' => '다음은 [[Special:Contributions/$1|$1]]이(가) 최근에 만든 문서입니다.
삭제에 대한 이유를 입력한 다음 아래 버튼을 클릭해주세요.',
	'nuke-list-multiple' => '다음은 최근에 생성된 문서입니다.
문서를 삭제하려면 이유를 입력하고 삭제 버튼을 누르십시오.',
	'nuke-defaultreason' => '$1이(가) 작성한 문서를 대량 삭제함',
	'nuke-tools' => '이 도구를 이용해 특정 사용자나 IP 사용자가 최근 생성한 문서를 대량으로 삭제할 수 있습니다.
삭제할 문서 목록을 가져오려면 계정 이름이나 IP 주소를 입력하십시오. 입력하지 않으면 모든 사용자를 대상으로 합니다.',
	'nuke-submit-user' => '계속',
	'nuke-submit-delete' => '선택한 문서 삭제',
	'right-nuke' => '문서 대량 삭제',
	'nuke-select' => '선택: $1',
	'nuke-userorip' => '계정 이름이나 IP 주소 (혹은 공란으로 남겨 두십시오):',
	'nuke-maxpages' => '문서의 최대 크기:',
	'nuke-multiplepeople' => '다수의 편집자',
	'nuke-editby' => '[[Special:Contributions/$1|$1]]이(가) 생성함',
);

/** Krio (Krio)
 * @author Jose77
 */
$messages['kri'] = array(
	'nuke-submit-user' => 'Go to am',
);

/** Kinaray-a (Kinaray-a)
 * @author Jose77
 */
$messages['krj'] = array(
	'nuke-submit-user' => 'Agto',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'nuke' => 'Sigge fottschmieße ang Mass',
	'nuke-desc' => 'Määd_et müjjelesch för de Wiki-Köbesse, [[Special:Nuke|angmass Sigge fottzeschmieße]].',
	'nuke-nopages' => 'Mer han kein neu Sigge {{GENDER:$1|vum|vum|vum Metmaacher|vun dä|vum}} [[Special:Contributions/$1|$1]] en de {{lcfirst:{{int:Recentchanges}}}}.',
	'nuke-list' => 'Hee di Sigge sen fum „[[Special:Contributions/$1|$1]]“ neu
aanjelaat woode. Jiff enne Jrond för et Fottschmieße aan,
un dann donn der Knopp zom Fottschmieße dröcke.',
	'nuke-list-multiple' => 'Heh di Sigge woodte köözlesch aanjelaat.
Jiv ene Jrond udder Zosammegfassung aan,
un kleck op dä Knopp för se fott ze schmiiße.',
	'nuke-defaultreason' => 'Fum $1 neu aanjelaate Sigge ang Block fottschmieße',
	'nuke-tools' => 'Di Sigg hee hellef Der, angmaß Sigge fottzeschmieße,
di ene bestemmpte enjeloggte udder namelose Metmaacher
köözlesch aanjalaat hät.
Jif dä Metmaacher-Name udder de IP-Address fun däm Naameloose aan,
öm en Liß met Sigge fun däm ze krijje,
udder lohß dat Feld läddesch, dann kriß De en Leß vun Alle.',
	'nuke-submit-user' => 'Leß holle',
	'nuke-submit-delete' => 'Donn de ußjewählte Sigge fottschmieße!',
	'right-nuke' => 'Massich Sigge Fottschmieße',
	'nuke-select' => 'Ußwähle: $1',
	'nuke-userorip' => 'Metmaacher_Name, <i lang="en">IP</i>-Addräß udder nix:',
	'nuke-maxpages' => 'Nit mieh Sigge, wi:',
	'nuke-multiplepeople' => 'ongerscheidlijje Metmaacher',
	'nuke-editby' => 'Aanjelaat vum [[Special:Contributions/$1|$1]]',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 */
$messages['lb'] = array(
	'nuke' => 'Masse-Läschung',
	'nuke-desc' => "Gëtt Administrateuren d'Méiglechkeet fir [[Special:Nuke|vill Säite mateneen ze läschen]]",
	'nuke-nopages' => 'Et gëtt bei de läschten Ännerunge keng nei Säite vum [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Dës Säite goufe viru kuerzem vum [[Special:Contributions/$1|$1]] nei ugeluecht; gitt w.e.g. eng Bemierkung an, an dréckt op de Knäppche Läschen.',
	'nuke-list-multiple' => 'Dës Säite goufe rezent gemaach;
setzt eng Bemierkung derbäi a klickt op de Knäppche fir se ze läschen.',
	'nuke-defaultreason' => 'Masse-Läschung vu Säiten, déi vum $1 ugefaang goufen',
	'nuke-tools' => "Dësen Tool erlaabt vill Säite mateneen ze läschen, déi vun engem Benotzer oder vun enger IP-Adresse ugeluecht goufen.
Gitt w.e.g. d'IP-Adress respektiv de Benotzer n fir eng Lescht vun de Säiten ze kréien déi geläscht solle ginn, oder loosst et eidel fir all Benotzer.",
	'nuke-submit-user' => 'Lass',
	'nuke-submit-delete' => 'Ugewielt läschen',
	'right-nuke' => 'Vill Säite matenee läschen',
	'nuke-select' => 'Eraussichen:$1',
	'nuke-userorip' => 'Benotzernumm, IP-Adress oder eidel:',
	'nuke-maxpages' => 'Maximal Zuel vu Säiten:',
	'nuke-multiplepeople' => 'méi Benotzer',
	'nuke-editby' => 'Gemaach vum [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "D'Säit '''$1''' gouf geläscht.",
	'nuke-not-deleted' => "D'Säit [[:$1]] '''konnt net''' geläscht ginn.",
);

/** Limburgish (Limburgs)
 * @author Aelske
 * @author Matthias
 * @author Ooswesthoesbes
 * @author Pahles
 */
$messages['li'] = array(
	'nuke' => 'Massaal weggoeje',
	'nuke-desc' => "Geuf beheerdersj de meugelikheid óm [[Special:Nuke|massaal pagina's weg te goeje]]",
	'nuke-nopages' => "Gein nuuj pagina's van [[Special:Contributions/$1|$1]] in de recente wieziginge.",
	'nuke-list' => "De onderstaonde pagina's zien recentelijk aangemaakt door [[Special:Contributions/$1|$1]]; voer 'n rede in en klik op de knop om ze te verwijdere/",
	'nuke-defaultreason' => "Massaal weggoeje van pagina's van $1",
	'nuke-tools' => "Dit hölpmiddel maak 't meugelik massaal pagina's te wisse die recentelijk zin aangemaak door 'n gebroeker of IP-adres. Veur de gebroekersnaam of 't IP-adres in veur 'n liees van te wisse pagina's:",
	'nuke-submit-user' => 'Gank',
	'nuke-submit-delete' => 'Geslecteerd wisse',
	'right-nuke' => "Massaal pagina's weggoeje",
);

/** Lithuanian (Lietuvių)
 * @author Homo
 * @author Matasg
 */
$messages['lt'] = array(
	'nuke' => 'Masinis trynimas',
	'nuke-desc' => 'Suteikia administratoriams galimybę [[Special:Nuke|masiškai trinti]] puslapius',
	'nuke-nopages' => 'Nėra naujų puslapių, sukurtų [[Special:Contributions/$1|$1]] naujausiuose keitimuose.',
	'nuke-list' => 'Šiuos puslapius neseniai sukūrė [[Special:Contributions/$1|$1]];
įrašykite komentarą ir paspauskite mygtuką, kad jie būtų ištrinti.',
	'nuke-defaultreason' => 'Masinis pašalinimas puslapių, kuriuos sukūrė $1',
	'nuke-tools' => 'Šis įrankis leidžia masiškai ištrinti puslapius, neseniai sukurtus nurodyto naudotojo ar IP.
Įrašykite naudotojo vardą ar IP adresą, kad gautumėte trintinų puslapių sąrašą.',
	'nuke-submit-user' => 'Išsiųsti',
	'nuke-submit-delete' => 'Ištrinti pasirinktus(ą)',
	'right-nuke' => 'Masinis puslapių trynėjas',
);

/** Literary Chinese (文言) */
$messages['lzh'] = array(
	'nuke' => '量刪',
	'nuke-nopages' => '近易無示[[Special:Contributions/$1|$1]]之新頁。',
	'nuke-list' => '[[Special:Contributions/$1|$1]]之作所示；剔註再點刪之。',
	'nuke-defaultreason' => '量刪由$1所建之頁',
	'nuke-tools' => '此意供簿或IP建之頁。入簿名加號取表作刪也：',
	'nuke-submit-user' => '往',
	'nuke-submit-delete' => '刪已擇',
	'right-nuke' => '量刪頁',
);

/** Malagasy (Malagasy)
 * @author Jagwar
 */
$messages['mg'] = array(
	'right-nuke' => 'Mamafa pejy maro',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'nuke' => 'Групно бришење',
	'nuke-desc' => 'Им дава можност на администраторите да вршат [[Special:Nuke|групно бришење]] на страници',
	'nuke-nopages' => 'Нема нови страници од [[Special:Contributions/$1|$1]] во скорешните промени.',
	'nuke-list' => 'Следниве страници биле неодамна создадени од [[Special:Contributions/$1|$1]];
вметнете коментар и притиснете на копчето за да ги избришете',
	'nuke-list-multiple' => 'Следниве страници се создадени неодамна.
Внесете коментар и стиснете на копчето за да ги избришете.',
	'nuke-defaultreason' => 'Групно отстранување на страници додадени од $1',
	'nuke-tools' => 'Оваа алатка овозможува збирни бришења на страници неодамна додадени од извесен корисник или IP-адреса.
Внесете го корисничкото име или IP-адреса за да го добиете списокот на страници за бришење, или пак оставете го празно ако сакате да се наведат сите корисници.',
	'nuke-submit-user' => 'Изврши',
	'nuke-submit-delete' => 'Избриши ги избраните',
	'right-nuke' => 'Групно бришење на страници',
	'nuke-select' => 'Одбери: $1',
	'nuke-userorip' => 'Корисничко име, IP-адреса или празно:',
	'nuke-maxpages' => 'Макс. број на страници:',
	'nuke-multiplepeople' => 'повеќе лица',
	'nuke-editby' => 'Создадено од [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Страницата '''$1''' е избришана.",
	'nuke-not-deleted' => "Страницата [[:$1]] '''не можеше''' да се избрише.",
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 * @author Shijualex
 */
$messages['ml'] = array(
	'nuke' => 'കൂട്ട മായ്ക്കൽ',
	'nuke-desc' => 'സിസോപ്പുകൾക്ക്  താളുകൾ [[Special:Nuke|കൂട്ടമായി മായ്ക്കാനുള്ള]] അവകാശം നൽകുക',
	'nuke-nopages' => '[[Special:Contributions/$1|$1]] ഉണ്ടാക്കിയ പുതിയ താളുകളൊന്നും പുതിയ മാറ്റങ്ങളിലില്ല.',
	'nuke-list' => 'താഴെ പ്രദർശിപ്പിച്ചിരിക്കുന്ന താളുകൾ [[Special:Contributions/$1|$1]] സമീപ കാലത്ത് സൃഷ്ടിച്ചവ ആണ്‌;
ഇവ മായ്ക്കുവാൻ അഭിപ്രായം രേഖപ്പെടുത്തിയതിനു ശേഷം ബട്ടൺ അമർത്തുക.',
	'nuke-list-multiple' => 'താഴെക്കൊടുത്തിരിക്കുന്ന താളുകൾ അടുത്തിടെ സൃഷ്ടിച്ചതാണ്;
അഭിപ്രായമാക്കിയിട്ട് അവ മായ്ക്കാനായി ബട്ടൺ ഞെക്കുക.',
	'nuke-defaultreason' => '$1 ചേർത്ത താളുകൾ മൊത്തമായി മായ്ക്കുന്നതിനുള്ള സം‌വിധാനം',
	'nuke-tools' => 'ഏതെങ്കിലും ഒരു ഉപയോക്താവ് അല്ലെങ്കിൽ ഐ.പി. സമീപകാലത്തു സൃഷ്ടിച്ച താളുകൾ കൂട്ടമായി മായ്ക്കാനുള്ള സൗകര്യം ഈ സം‌വിധാനം നൽകുന്നു. ഉപയോക്തൃനാമം അല്ലെങ്കിൽ ഐ.പി. ഇവിടെ നൽകിയാൽ മായ്ക്കേണ്ട താളുകളുടെ പട്ടിക ലഭ്യമാകുന്നതാണ്, എല്ലാ ഉപയോക്താക്കളും സൃഷ്ടിച്ചിട്ടുള്ള താൾ മായ്ക്കാൻ ശൂന്യമായിടുക.',
	'nuke-submit-user' => 'പോകൂ',
	'nuke-submit-delete' => 'തിരഞ്ഞെടുത്തവ മായ്ക്കുക',
	'right-nuke' => 'താളുകൾ കൂട്ടത്തോടെ മായ്ക്കുക',
	'nuke-select' => 'തിരഞ്ഞെടുക്കുക: $1',
	'nuke-userorip' => 'ഉപയോക്തൃനാമം, ഐ.പി. വിലാസം അല്ലെങ്കിൽ ശൂന്യമായിടുക:',
	'nuke-maxpages' => 'പരമാവധി എത്ര താളുകൾ:',
	'nuke-multiplepeople' => 'ഒന്നിലധികം പേർ',
	'nuke-editby' => 'നിർമ്മിച്ചത് [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "'''$1''' എന്ന താൾ മായ്ച്ചു കഴിഞ്ഞു.",
	'nuke-not-deleted' => "[[:$1]] എന്ന താൾ മായ്ക്കാൻ '''കഴിയില്ല'''.",
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'nuke' => 'एकदम खूप पाने वगळा',
	'nuke-desc' => 'प्रबंधकांना एकाचवेळी [[Special:Nuke|अनेक पाने वगळण्याची]] परवानगी देते',
	'nuke-nopages' => '[[Special:Contributions/$1|$1]] कडून अलीकडील बदलांमध्ये नवीन पाने नाहीत.',
	'nuke-list' => 'खालील पाने ही [[Special:Contributions/$1|$1]] ने अलिकडे वाढविलेली आहेत; शेरा द्या व वगळण्यासाठी कळीवर टिचकी द्या.',
	'nuke-defaultreason' => '$1 ने नवीन वाढविलेली अनेक पाने एकावेळी वगळा',
	'nuke-tools' => 'हे उपकरण एखाद्या विशिष्ट सदस्य अथवा अंकपत्त्याद्वारे नवीन तयार करण्यात आलेल्या पानांना एकाचवेळी वगळण्याची संधी देते. सदस्य नाव अथवा अंकपत्ता दिल्यास वगळण्यासाठी पानांची यादी मिळेल:',
	'nuke-submit-user' => 'जा',
	'nuke-submit-delete' => 'निवडलेले वगळा',
	'right-nuke' => 'खूप पाने एकत्र वगळा',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 * @author Aviator
 */
$messages['ms'] = array(
	'nuke' => 'Hapus pukal',
	'nuke-desc' => 'Membolehkan penyelia [[Special:Nuke|menghapuskan laman-laman]] secara pukal',
	'nuke-nopages' => 'Tiada laman baru oleh [[Special:Contributions/$1|$1]] dalam senarai perubahan terkini.',
	'nuke-list' => 'Laman-laman berikut dicipta oleh [[Special:Contributions/$1|$1]]; sila masukkan komen anda dan tekan butang untuk menghapuskannya.',
	'nuke-list-multiple' => 'Laman-laman berikut baru diwujudkan;
isikan komen dan tekan butang untuk menghapuskannya.',
	'nuke-defaultreason' => 'Menghapuskan laman-laman yang ditambah oleh $1 secara pukal',
	'nuke-tools' => 'Alat ini membolehkan penghapusan secara besar-besaran laman-laman yang dibuka oleh pengguna atau alamat IP tertentu.
Isikan nama pengguna atau alamat IP untuk mendapat senarai laman yang hendak dikosongkan, atau biarkan kosong untuk semua pengguna.',
	'nuke-submit-user' => 'Pergi',
	'nuke-submit-delete' => 'Hapus',
	'right-nuke' => 'Menghapuskan laman secara pukal',
	'nuke-select' => 'Pilih: $1',
	'nuke-userorip' => 'Nama pengguna, alamat IP atau kosong:',
	'nuke-maxpages' => 'Bilangan halaman maksimum:',
	'nuke-multiplepeople' => 'berbilang pengguna',
	'nuke-editby' => 'Dibuat oleh [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Laman '''$1''' telah dihapuskan.",
	'nuke-not-deleted' => "Laman [[:$1]] '''tidak dapat''' dihapuskan.",
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'nuke' => 'Tħassir tal-massa',
	'nuke-desc' => "Jagħti lill-amministraturi l-għodda li [[Special:Nuke|jħassru bil-massa]] numru ta' paġni.",
	'nuke-nopages' => 'Ma nstabu l-ebda paġni ġodda maħluqa minn [[Special:Contributions/$1|$1]] fost it-tibdil riċenti.',
	'nuke-list' => 'Il-paġni segwenti ġew riċentament maħluqa minn [[Special:Contributions/$1|$1]];
daħħal kumment u agħfas il-buttuna sabiex tħassarhom.',
	'nuke-defaultreason' => "Tħassir ta' massa ta' paġni miżjuda minn $1",
	'nuke-tools' => "Din l-għodda tippermetti t-tħassir ta' massa ta' paġni li ġew miżjuda riċentament minn utent partikulari jew IP.
Daħħal l-isem tal-utent jew l-indirizz IP biex tikseb lista ta' paġni li jridu jitħassru, jew ħalliha votja sabiex issejjaħ l-utenti kollha.",
	'nuke-submit-user' => 'Mur',
	'nuke-submit-delete' => 'Ħassar dawk magħżula',
	'right-nuke' => 'Ħassar paġni bil-massa',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'nuke-submit-user' => 'Адя',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'nuke' => 'Huēyi tlapololiztli',
	'nuke-submit-user' => 'Yāuh',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'nuke' => 'General-Utmesten',
	'nuke-desc' => 'Verlöövt Administraters dat [[Special:Nuke|General-Utmesten]] vun Sieden',
	'nuke-nopages' => 'Gifft in de Ne’esten Ännern kene ne’en Sieden vun [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Disse Sieden hett [[Special:Contributions/$1|$1]] nee maakt; geev en Kommentar in un drück op den Utmest-Knopp.',
	'nuke-defaultreason' => 'General-Utmesten vun Sieden, de $1 anleggt hett',
	'nuke-tools' => 'Dit Warktüüch verlöövt dat General-Utmesten vun Sieden, de vun ene IP-Adress oder en Bruker anleggt worrn sünd. Geev de IP-Adress oder den Brukernaam in, dat du ene List kriggst:',
	'nuke-submit-user' => 'List kriegen',
	'nuke-submit-delete' => 'Utmesten',
	'right-nuke' => 'Groten Hümpel Sieden wegsmieten',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'nuke' => 'Massaal vortdoon',
	'nuke-desc' => "Hiermee kunnen beheerders [[Special:Nuke|massaal pagina's vortdoon]]",
	'nuke-nopages' => "Gien nieje pagina's van [[Special:Contributions/$1|$1]] in de leste wiezigingen.",
	'nuke-defaultreason' => "Massaal pagina's van $1 vortdoon",
	'right-nuke' => "Massaal pagina's vortdoon",
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'nuke' => 'Massaal verwijderen',
	'nuke-desc' => "Geeft beheerders de mogelijkheid om [[Special:Nuke|massaal pagina's te verwijderen]]",
	'nuke-nopages' => "Geen nieuwe pagina's van [[Special:Contributions/$1|$1]] in de recente wijzigingen.",
	'nuke-list' => "De onderstaande pagina's zijn recentelijk aangemaakt door [[Special:Contributions/$1|$1]]; voer een reden in en klik op de knop om ze te verwijderen.",
	'nuke-list-multiple' => "De volgende pagina's zijn recentelijk aangemaakt.
Geef een reden op en klik op de knop om ze te verwijderen.",
	'nuke-defaultreason' => "Massaal verwijderen van pagina's van $1",
	'nuke-tools' => "Dit hulpmiddel maakt het mogelijk pagina's die recentelijk zijn aangemaakt door een gebruiker of IP-adres massaal te verwijderen.
Voer de gebruikersnaam of het IP-adres in voor een lijst van te verwijderen pagina's of laat leeg voor alle gebruikers.",
	'nuke-submit-user' => 'OK',
	'nuke-submit-delete' => 'Selectie verwijderen',
	'right-nuke' => "Massaal pagina's verwijderen",
	'nuke-select' => 'Selectie: $1',
	'nuke-userorip' => 'Gebruikersnaam, IP-adres of leeg:',
	'nuke-maxpages' => "Maximum aantal pagina's:",
	'nuke-multiplepeople' => 'meerdere gebruikers',
	'nuke-editby' => 'Aangemaakt door [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Pagina '''$1''' is verwijderd.",
	'nuke-not-deleted' => "Pagina [[:$1]] '''kon niet''' worden verwijderd.",
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'nuke' => 'Massesletting',
	'nuke-desc' => 'Gjev administratorane moglegheita til å [[Special:Nuke|massesletta]] sider',
	'nuke-nopages' => 'Ingen nye sider av [[Special:Contributions/$1|$1]] i siste endringar.',
	'nuke-list' => 'Følgjande sider blei nyleg oppretta av [[Special:Contributions/$1|$1]]. 
Skriv inn ei sletteårsak og trykk på knappen for å sletta alle sidene.',
	'nuke-defaultreason' => 'Massesletting av sider lagde inn av $1',
	'nuke-tools' => 'Dette verktøyet mogleggjer massesletting av sider som nyleg er lagde inn av ein viss brukar eller ei viss IP-adressa. 
Skriv inn eit brukarnamn eller ei IP-adressa for å få ei lista over sider som ein kan sletta her.',
	'nuke-submit-user' => 'Gå',
	'nuke-submit-delete' => 'Slett valde',
	'right-nuke' => 'Masseslett sider',
	'nuke-select' => 'Vel: $1',
	'nuke-multiplepeople' => 'fleire brukarar',
	'nuke-editby' => 'Oppretta av [[Special:Contributions/$1|$1]]',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'nuke' => 'Massesletting',
	'nuke-desc' => 'Gir administratorer muligheten til å [[Special:Nuke|masseslette]] sider',
	'nuke-nopages' => 'Ingen nye sider av [[Special:Contributions/$1|$1]] i siste endringer.',
	'nuke-list' => 'Følgende sider ble nylig opprettet av [[Special:Contributions/$1|$1]]; skriv inn en slettingsgrunn og trykk på knappen for å slette alle sidene.',
	'nuke-defaultreason' => 'Massesletting av sider lagt inn av $1',
	'nuke-tools' => 'Dette verktøyet muliggjør massesletting av sider som nylig er lagt inn av en gitt bruker eller IP. Skriv et brukernavn eller en IP for å få en liste over sider som slettes:',
	'nuke-submit-user' => 'Gå',
	'nuke-submit-delete' => 'Slett valgte',
	'right-nuke' => 'Slette sider <i>en masse</i>',
	'nuke-select' => 'Velg: $1',
	'nuke-editby' => 'Opprettet av [[Special:Contributions/$1|$1]]',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'nuke-submit-user' => 'Sepela',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'nuke' => 'Supression en massa',
	'nuke-desc' => 'Balha la possiblitat als administrators de [[Special:Nuke|suprimir en massa]] de paginas.',
	'nuke-nopages' => 'Cap de pagina novèla creada per [[Special:Contributions/$1|$1]] dins la lista dels darrièrs cambiaments.',
	'nuke-list' => 'Las paginas seguentas son estadas creadas recentament per [[Special:Contributions/$1|$1]]; Indicatz un comentari e clicatz sul boton per los suprimir.',
	'nuke-defaultreason' => 'Supression en massa de las paginas apondudas per $1',
	'nuke-tools' => 'Aquesta aisina autoriza las supressions en massa de las paginas apondudas recentament per un utilizaire enregistrat o per una adreça IP. Indicatz l’adreça IP per obténer la tièra de las paginas de suprimir :',
	'nuke-submit-user' => 'Validar',
	'nuke-submit-delete' => 'Supression seleccionada',
	'right-nuke' => 'Suprimir de paginas en massa',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'nuke' => 'Бирæгай аппарын',
	'nuke-submit-user' => 'Афтæ уæд',
	'right-nuke' => 'фæрстæ бирæгай аппарын',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'nuke-submit-user' => 'Lischt hole',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Leinad
 * @author Nux
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'nuke' => 'Masowe usuwanie',
	'nuke-desc' => 'Dodaje administratorom funkcję równoczesnego [[Special:Nuke|usuwania dużej liczby stron]]',
	'nuke-nopages' => 'Brak nowych stron autorstwa [[Special:Contributions/$1|$1]] w ostatnich zmianach.',
	'nuke-list' => 'Następujące strony zostały ostatnio utworzone przez [[Special:Contributions/$1|$1]]; wpisz komentarz i wciśnij przycisk by usunąć je.',
	'nuke-list-multiple' => 'Poniższa lista przedstawia ostatnio dodane strony.
Wpisz powód, a następnie zatwierdź usunięcie stron.',
	'nuke-defaultreason' => 'Masowe usunięcie stron dodanych przez $1',
	'nuke-tools' => 'Narzędzie pozwala na masowe usuwanie stron ostatnio dodanych przez zarejestrowanego lub anonimowego użytkownika.
Wpisz nazwę użytkownika lub adres IP by otrzymać listę stron do usunięcia. Możesz także nic nie wpisywać, wtedy będzie można masowo usunąć wkład wszystkich użytkowników.',
	'nuke-submit-user' => 'Dalej',
	'nuke-submit-delete' => 'Usuń zaznaczone',
	'right-nuke' => 'Masowe usuwanie stron',
	'nuke-select' => 'Wybierz: $1',
	'nuke-userorip' => 'Podaj nazwę użytkownika, adres IP lub pozostaw puste pole',
	'nuke-maxpages' => 'Maksymalna liczba stron',
	'nuke-multiplepeople' => 'wielu użytkowników',
	'nuke-editby' => 'Utworzona przez [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Strona '''$1''' została usunięta.",
	'nuke-not-deleted' => "Strony [[:$1]] '''nie można''' usunąć.",
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Bèrto 'd Sèra
 * @author Dragonòt
 */
$messages['pms'] = array(
	'nuke' => "Scancelament d'amblé",
	'nuke-desc' => "A dà a j'aministrador l'abilitassion a [[Special:Nuke|scanselé a baron]] le pàgine",
	'nuke-nopages' => "Gnun-a pàgine faite da [[Special:Contributions/$1|$1]] ant j'ùltim cambiament.",
	'nuke-list' => "Ste pàgine-sì a son staite faite ant j'ùltim temp da [[Special:Contributions/$1|$1]]; ch'a lassa un coment e ch'a-i daga 'n colp ansima al boton për gaveje via tute d'amblé.",
	'nuke-list-multiple' => "Le pàgine sì-dapress a son stàite creà da pòch;
ch'a buta un coment e ch'a sgnaca ël boton për scanceleje.",
	'nuke-defaultreason' => "Scancelament d'amblé dle pàgine faite da $1",
	'nuke-tools' => "St'utiss-sì a lassa scancelé d'amblé le pàgine giontà ant j'ùltim temp da un chèich utent ò da 'nt na chèicha adrëssa IP. Ch'a buta lë stranòm ò l'adrëssa IP për tiré giù na lista dle pàgine da scancelé, o ch'a lassa an bianch për tùit j'utent.",
	'nuke-submit-user' => 'Va',
	'nuke-submit-delete' => 'Scansela le selessionà',
	'right-nuke' => 'Scansela le pàgine a baron',
	'nuke-select' => 'Selessioné: $1',
	'nuke-userorip' => 'Nòm utent, adrëssa IP o gnente:',
	'nuke-maxpages' => 'Màssim nùmer ëd pàgine:',
	'nuke-multiplepeople' => 'pi utent',
	'nuke-editby' => 'Creà da [[Special:Contributions/$1|$1]]',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'nuke-submit-user' => 'ورځه',
	'nuke-submit-delete' => 'ټاکل شوی ړنګول',
);

/** Portuguese (Português)
 * @author 555
 * @author Hamilton Abreu
 * @author Malafaya
 */
$messages['pt'] = array(
	'nuke' => 'Eliminação em massa',
	'nuke-desc' => '[[Special:Nuke|Página especial]] que permite que os administradores apaguem páginas de forma massiva',
	'nuke-nopages' => 'Não há páginas criadas por [[Special:Contributions/$1|$1]] nas mudanças recentes.',
	'nuke-list' => 'As páginas a seguir foram criadas recentemente por [[Special:Contributions/$1|$1]]; introduza um comentário e pressione o botão a seguir para eliminá-las.',
	'nuke-list-multiple' => 'As seguintes páginas foram criadas recentemente;
introduza um comentário e clique o botão para eliminá-las.',
	'nuke-defaultreason' => 'Eliminação em massa de páginas criadas por $1',
	'nuke-tools' => 'Esta ferramenta permite a eliminação em massa de páginas criadas recentemente por um utilizador ou IP específico. Forneça o nome de utilizador ou o IP para obter a lista de páginas a eliminar, ou deixe em branco para todos os utilizadores.',
	'nuke-submit-user' => 'Ir',
	'nuke-submit-delete' => 'Eliminar as seleccionadas',
	'right-nuke' => 'Eliminar páginas em massa',
	'nuke-select' => 'Seleccionar: $1',
	'nuke-userorip' => 'Utilizador, endereço IP, ou vazio:',
	'nuke-maxpages' => 'Nº máximo de páginas:',
	'nuke-multiplepeople' => 'vários utilizadores',
	'nuke-editby' => 'Criada por [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "A página '''$1''' foi eliminada.",
	'nuke-not-deleted' => 'Não foi possível eliminar a página [[:$1]].',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Carla404
 * @author Eduardo.mps
 * @author Giro720
 */
$messages['pt-br'] = array(
	'nuke' => 'Eliminar em massa',
	'nuke-desc' => 'Dá aos sysops a possibilidade de [[Special:Nuke|apagar páginas em massa]]',
	'nuke-nopages' => 'Não há novas páginas criadas por [[Special:Contributions/$1|$1]] nas mudanças recentes.',
	'nuke-list' => 'As páginas a seguir foram criadas recentemente por [[Special:Contributions/$1|$1]]; forneça uma justificativa e pressione o botão a seguir para eliminá-las.',
	'nuke-list-multiple' => 'As seguintes páginas foram criadas recentemente;
introduza um comentário e clique o botão para eliminá-las.',
	'nuke-defaultreason' => 'Eliminação em massa de páginas criadas por $1',
	'nuke-tools' => 'Esta ferramenta permite a eliminação em massa de páginas criadas recentemente por um usuário ou IP específico.
Forneça o nome de usuário ou o IP para obter a lista de páginas a eliminar, ou deixe em branco para todos os usuários.',
	'nuke-submit-user' => 'Ir',
	'nuke-submit-delete' => 'Eliminar as selecionadas',
	'right-nuke' => 'Eliminar páginas em massa',
	'nuke-select' => 'Selecionar: $1',
	'nuke-userorip' => 'Nome de usuário, endereço IP, ou vazio:',
	'nuke-maxpages' => 'Número máximo de páginas:',
	'nuke-multiplepeople' => 'vários usuários',
	'nuke-editby' => 'Criada por [[Special:Contributions/$1|$1]]',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'nuke' => 'Tawqa qulluy',
	'nuke-desc' => "Kamachiqkunata [[Special:Nuke|p'anqa tawqa qulluywan]] atichin",
	'nuke-nopages' => "Manam kanchu [[Special:Contributions/$1|$1]]-pa musuqta kamarisqan p'anqakuna ñaqha hukchasqakunapi.",
	'nuke-list' => "Kay qatiq p'anqakunataqa [[Special:Contributions/$1|$1]] ruraqmi kamarirqun; imarayku nispa butunta ñit'iy tawqalla qullunapaq.",
	'nuke-list-multiple' => "Kay qatiq p'anqakunaqa ñaqha kamarisqam;
imatapas willapuspa butunta ñit'ipay qullunapaq.",
	'nuke-defaultreason' => "$1-pa rurasqan p'anqakunata tawqalla qulluy",
	'nuke-tools' => "Kay llamk'anawanqa huk ruraqpa icha huk IP huchhap ñaqha kamarisqan p'anqakunata tawqalla qulluytam atinki.
Ruraqpa sutinta icha IP huchhanta yaykuchiy qulluna p'anqakunata rikunaykipaq.",
	'nuke-submit-user' => 'Riy',
	'nuke-submit-delete' => 'Akllasqata qulluy',
	'right-nuke' => "Tawqa qulluna p'anqakuna",
	'nuke-select' => 'Akllay: $1',
	'nuke-userorip' => "Ruraqpa sutin, IP huchha icha ch'usaq:",
	'nuke-maxpages' => "Kay chhika p'anqakunamanta ama aswan kachunchu:",
	'nuke-multiplepeople' => 'imaymana ruraqkuna',
	'nuke-editby' => '[[Special:Contributions/$1|$1]] sutiyuqpa kamarisqan',
);

/** Tarifit (Tarifit)
 * @author Jose77
 */
$messages['rif'] = array(
	'nuke-submit-user' => 'Raḥ ɣa',
);

/** Romanian (Română)
 * @author Cin
 * @author Firilacroco
 * @author KlaudiuMihaila
 * @author Mihai
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'nuke' => 'Ştergere în masă',
	'nuke-desc' => 'Oferă administratorilor abilitatea de [[Special:Nuke|a șterge în masă]] pagini',
	'nuke-nopages' => 'Nicio pagină nouă de către [[Special:Contributions/$1|$1]] în schimbările recente.',
	'nuke-list' => 'Aceste pagini au fost recent create de [[Special:Contributions/$1|$1]];
adăugați un comentariu și apăsați butonul pentru a le șterge.',
	'nuke-defaultreason' => 'Eliminatorul în masă al paginilor adăugat de $1',
	'nuke-tools' => 'Această unealtă permite ștergeri în masă a paginilor recent adăugate de către un utilizator dat sau adresă IP.
Introduceți numele de utilizator sau adresa IP pentru a primi o listă cu paginile de șters sau nu completați nimic pentru a lua în calcul toți utilizatorii.',
	'nuke-submit-user' => 'Du-te',
	'nuke-submit-delete' => 'Șterge ce e marcat',
	'right-nuke' => 'șterge pagini în masă',
	'nuke-select' => 'Alegeți: $1',
	'nuke-userorip' => 'Nume de utilizator, adresă IP sau necompletare:',
	'nuke-maxpages' => 'Număr maxim de pagini:',
	'nuke-multiplepeople' => 'mai mulți utilizatori',
	'nuke-editby' => 'Creat de [[Special:Contributions/$1|$1]]',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'nuke' => 'Scangellazione de masse',
	'nuke-desc' => "Dà a l'amministrature l'abbilità de [[Special:Nuke|scangellà massivamende]] le pàggene",
	'nuke-nopages' => "Nisciuna pàgena nove da [[Special:Contributions/$1|$1]] jndr'à l'urteme cangiaminde.",
	'nuke-list' => "Le pàggene seguende onne state ccrejate recendemende da [[Special:Contributions/$1|$1]];
mitte 'nu commende e cazze sus a 'u buttone pe scangellarle.",
	'nuke-list-multiple' => "Le pàggene seguende onne state ccrejate recendemende;
mitte 'nu commende e cazze 'u buttone pe scangellarle.",
	'nuke-defaultreason' => 'Scangellazzione de masse de le pàggene aggiunde da $1',
	'nuke-tools' => "Stu strumende permette le scangellazziune de masse de le pàggene aggiunde de recende da 'nu certe utende o IP.<br />
Mitte 'u nome de l'utende o l'indirizze IP pe avè 'n'elenghe de le pàggene de scangellà, o lasse vianghe pe tutte l'utinde.",
	'nuke-submit-user' => 'Veje',
	'nuke-submit-delete' => "Scangelle 'a selezione",
	'right-nuke' => 'Scangellazione de masse de le pàggene',
	'nuke-select' => 'Scacchie: $1',
	'nuke-userorip' => "Nome de l'utende, indirizze IP o vianghe:",
	'nuke-maxpages' => 'Numere massime de pàggene:',
	'nuke-multiplepeople' => 'utinde multiple',
	'nuke-editby' => 'Ccrejate da [[Special:Contributions/$1|$1]]',
);

/** Russian (Русский)
 * @author HalanTul
 * @author VasilievVV
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'nuke' => 'Множественное удаление',
	'nuke-desc' => 'Даёт администраторам возможность [[Special:Nuke|множественного удаления]] страниц',
	'nuke-nopages' => 'Созданий страниц участником [[Special:Contributions/$1|$1]] не найдено в свежих правках.',
	'nuke-list' => 'Следующие страницы были недавно созданы участником [[Special:Contributions/$1|$1]]. Введите комментарий и нажмите на кнопку для того, чтобы удалить их.',
	'nuke-list-multiple' => 'Следующие страницы были недавно созданы.
Оставьте примечание и нажмите кнопку, чтобы удалить их.',
	'nuke-defaultreason' => 'Множественное удаление страниц, созданных участником $1',
	'nuke-tools' => 'Эта страница позволяет множественно удалять страницы, недавно созданные определённым участником или с заданного IP-адреса.
Введите имя участника или IP-адрес, чтобы получить список страниц для удаления, или оставьте поле пустым, если хотите выбрать всех участников.',
	'nuke-submit-user' => 'Выполнить',
	'nuke-submit-delete' => 'Удалить выбранные',
	'right-nuke' => 'множественное удаление страниц',
	'nuke-select' => 'Выбор: $1',
	'nuke-userorip' => 'Имя участника, IP-адрес (можно оставить пустым):',
	'nuke-maxpages' => 'Максимальное количество страниц:',
	'nuke-multiplepeople' => 'нескольких участников',
	'nuke-editby' => 'Созданные [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Страница '''$1''' была удалена.",
	'nuke-not-deleted' => "Страницы  [[:$1]] '''не может''' быть удалена.",
);

/** Rusyn (Русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'nuke' => 'Масове вылучіня',
	'nuke-submit-user' => 'Выконати',
	'nuke-submit-delete' => 'Змазати выбдарны',
	'right-nuke' => 'Масове вылучіня сторінок',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'nuke' => 'Маассабай сотуу',
	'nuke-desc' => 'Администраатардарга [[Special:Nuke|элбэх сирэйи биир дьайыыннан сотор]] кыаҕы биэрэр',
	'nuke-nopages' => 'Кэнники көннөрүүлэр испииһэктэригэр [[Special:Contributions/$1|$1]] саҥа сирэйи оҥорбута көстүбэтэ.',
	'nuke-list' => 'Бу сирэйдэри соторутааҕыта [[Special:Contributions/$1|$1]] кыттааччы оҥорбут. Сотуоххун баҕарар буоллаххына быһаарыыны оҥорон баран тимэҕи баттаа.',
	'nuke-list-multiple' => 'Бу сирэйдэр соторутааҕыта оҥоһуллубуттар.
Соторго быһаарыыта суруйан баран тимэҕи баттаа.',
	'nuke-defaultreason' => '$1 кыттааччы айбыт сирэйдэрин бүтүннүү суох оҥоруу',
	'nuke-tools' => 'Бу сирэй көмөтүнэн ханнык эмэ кыттааччы оҥорбут көннөрүүлэрин эбэтэр биир IP-ттан оҥоһуллубут көннөрүүлэри бүтүннүү суох гынахха сөп. 
Кыттааччы аатын эбэтэр IP-тын киллэрдэххинэ оҥорбут көннөрүүлэрин тиһигэ тахсыа, кураанах хааллардаххына бары кыттааччылар көннөрүүлэрэ көстүө.',
	'nuke-submit-user' => 'Толор',
	'nuke-submit-delete' => 'Талыллыбыты сот',
	'right-nuke' => 'Сирэйдэри халҕаһалыы суох оҥоруу',
	'nuke-select' => 'Талыы: $1',
	'nuke-userorip' => 'Кыттааччы аата, IP-аадырыһа (кураанах хаалларыахха сөп):',
	'nuke-maxpages' => 'Сирэй ахсаанын хааччаҕа (максимум):',
	'nuke-multiplepeople' => 'элбэх кыттааччы',
	'nuke-editby' => 'Оҥоһуллубуттар [[Special:Contributions/$1|$1]]',
);

/** Sicilian (Sicilianu)
 * @author Santu
 */
$messages['scn'] = array(
	'nuke' => 'Scancella la massa',
	'nuke-desc' => "Pirmetti a l'amministraturi la [[Special:Nuke|scancillazzioni 'n massa]] dê pàggini",
	'nuke-nopages' => "Nun s'attruvaru pàggini novi criati di [[Special:Contributions/$1|$1]] ntra li mudìfichi fatti di picca tempu.",
	'nuke-list' => 'Li pàggini ccà di sècutu havi picca ca foru criati di [[Special:Contributions/$1|$1]]; nzirisci nu cummentu e cunferma la scancillazzioni.',
	'nuke-defaultreason' => 'Scanciallazzioni di massa dê pàggini criati di $1',
	'nuke-tools' => "Stu strumentu pirmetti di scancillari 'n massa pàggini criati di picca tempu di N'utenti o IP. Nzirisci lu nomu utenti o lu IP pi la lista dê pàggini di scancillari.",
	'nuke-submit-user' => 'Và',
	'nuke-submit-delete' => 'Scancella la silizzioni',
	'right-nuke' => "Scancella pàggini 'n massa",
);

/** Sinhala (සිංහල)
 * @author නන්දිමිතුරු
 */
$messages['si'] = array(
	'nuke-submit-user' => 'යන්න',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'nuke' => 'Hromadné mazanie',
	'nuke-desc' => 'Dáva správcom schopnosť [[Special:Nuke|hromadného mazania]] stránok',
	'nuke-nopages' => 'V posledných zmenách sa nenachádzajú nové stránky od [[Special:Contributions/$1|$1]].',
	'nuke-list' => '[[Special:Contributions/$1|$1]] nedávno vytvoril nasledovné nové stránky; vyplňte komentár a stlačením tlačidla ich vymažete.',
	'nuke-list-multiple' => 'Tieto stránky boli nedávno vytvorené;
vložením komentára a stlačením tlačidla ich môžete zmazať.',
	'nuke-defaultreason' => 'Hromadné odstránenie stránok, ktoré pridal $1',
	'nuke-tools' => 'Tento nástroj umožňuje hromadné odstránenie stránok, ktoré nedávno pridal zadaný používateľ alebo IP.
Zadajte používateľa alebo IP a dostanete zoznam stránok na zmazanie. Ponechajte prázdne a použije sa na všetkých používateľov.',
	'nuke-submit-user' => 'Vykonať',
	'nuke-submit-delete' => 'Zmazať vybrané',
	'right-nuke' => 'Hromadné mazanie stránok',
	'nuke-select' => 'Vybrať: $1',
	'nuke-userorip' => 'Používateľské meno, IP adresa alebo prázdne:',
	'nuke-maxpages' => 'Maximálny počet strán:',
	'nuke-multiplepeople' => 'viacerí používatelia',
	'nuke-editby' => 'Vytvoril [[Special:Contributions/$1|$1]]',
);

/** Slovenian (Slovenščina)
 * @author Dbc334
 */
$messages['sl'] = array(
	'nuke' => 'Množični izbris',
	'nuke-desc' => 'Da administratorjem zmožnost [[Special:Nuke|množičnega izbrisa]] strani',
	'nuke-nopages' => 'Ni novih strani uporabnika [[Special:Contributions/$1|$1]] v zadnjih spremembah.',
	'nuke-list' => 'Naslednje strani je nedavno ustvaril uporabnik [[Special:Contributions/$1|$1]];
vnesite komentar in pritisnite gumb za njihov izbris.',
	'nuke-list-multiple' => 'Naslednje strani so bile pred kratkim ustvarjene;
vnesite pripombo in kliknite gumb, da jih izbrišete.',
	'nuke-defaultreason' => 'Množično brisanje strani, ki jih je dodal $1',
	'nuke-tools' => 'To orodje omogoča množični izbris strani, ki jih je nedavno ustvaril določen uporabnik ali IP.
Vnesite uporabniško ime ali IP, da pridobite seznam strani za izbris, ali pustite prazno za vse uporabnike.',
	'nuke-submit-user' => 'Pojdi',
	'nuke-submit-delete' => 'Izbriši izbrano',
	'right-nuke' => 'Množično brisanje strani',
	'nuke-select' => 'Izberite: $1',
	'nuke-userorip' => 'Uporabniško ime, IP-naslov ali prazno:',
	'nuke-maxpages' => 'Največje število strani:',
	'nuke-multiplepeople' => 'več oseb',
	'nuke-editby' => 'Ustvaril(-a) [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Stran '''$1''' je bila izbrisana.",
	'nuke-not-deleted' => "Strani [[:$1]] '''ni bilo mogoče''' izbrisati.",
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Millosh
 * @author Rancher
 * @author Жељко Тодоровић
 */
$messages['sr-ec'] = array(
	'nuke' => 'Масовно брисање',
	'nuke-desc' => 'Даје администратору могућност да [[Special:Nuke|масовно брише]] странице.',
	'nuke-nopages' => 'Нема нових страница од стране корисника [[Special:Contributions/$1|$1]] у скорашњим изменама.',
	'nuke-list' => 'Следеће странице је скоро направио корисник [[Special:Contributions/$1|$1]]; коментариши и притисни дугме за њихово брисање.',
	'nuke-defaultreason' => 'Масовно брисање страница које је направио корисник $1',
	'nuke-tools' => 'Ово оруђе омогућава масовно брисање страница које је скоро додао одређени корисник (регистрован или не). Унеси корисничко име или ИП адресу за добијање списка страница за брисање.',
	'nuke-submit-user' => 'Иди',
	'nuke-submit-delete' => 'Обриши изабрано',
	'right-nuke' => 'масовно брисање страница',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬)
 * @author Michaello
 * @author Жељко Тодоровић
 */
$messages['sr-el'] = array(
	'nuke' => 'Masovno brisanje',
	'nuke-desc' => 'Daje administratoru mogućnost da [[Special:Nuke|masovno briše]] stranice.',
	'nuke-nopages' => 'Nema novih stranica od strane korisnika [[Special:Contributions/$1|$1]] u skorašnjim izmenama.',
	'nuke-list' => 'Sledeće stranice je skoro napravio korisnik [[Special:Contributions/$1|$1]]; komentariši i pritisni dugme za njihovo brisanje.',
	'nuke-defaultreason' => 'Masovno brisanje stranica koje je napravio korisnik $1.',
	'nuke-tools' => 'Ovo oruđe omogućava masovno brisanje stranica koje je skoro dodao određeni korisnik (registrovan ili ne). Unesi korisničko ime ili IP adresu za dobijanje spiska stranica za brisanje.',
	'nuke-submit-user' => 'Idi',
	'nuke-submit-delete' => 'Obriši obeleženo',
	'right-nuke' => 'Masovno brisanje strana.',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'nuke' => 'Massen-Läskenge',
	'nuke-desc' => 'Moaket Administratore ju [[Special:Nuke|Massenlöösenge]] fon Sieden muugelk',
	'nuke-nopages' => 'Dät rakt in do Lääste Annerengen neen näie Sieden fon [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Do foulgjende Sieden wuuden fon [[Special:Contributions/$1|$1]] moaked; reek n Kommentoar ien un tai ap dän Läsk-Knoop.',
	'nuke-defaultreason' => 'Massen-Läskenge fon Sieden, do der fon $1 anlaid wuden',
	'nuke-tools' => 'Disse Reewe moaket ju Massen-Läskenge muugelk fon Sieden, do der fon een IP-Adresse of aan Benutser anlaid wuuden. Reek ju IP-Adresse/die Benutsernoome ien, uum ne Lieste tou kriegen:',
	'nuke-submit-user' => 'Hoalje Lieste',
	'nuke-submit-delete' => 'Läskje',
	'right-nuke' => 'Massenlöösenge fon Sieden',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 * @author Kandar
 */
$messages['su'] = array(
	'nuke' => 'Ngahapus masal',
	'nuke-desc' => 'Leler kuncén kawenangan pikeun [[Special:Nuke|ngahapus kaca sacara masal]]',
	'nuke-nopages' => 'Euweuh kaca anyar karya [[Special:Contributions/$1|$1]] dina béréndélan nu anyar robah.',
	'nuke-list' => 'Kaca di handap anyar dijieun ku [[Special:Contributions/$1|$1]];<br />
tuliskeun pamanggih anjeun, terus pencét tombolna pikeun ngahapus.',
	'nuke-defaultreason' => 'Ngahapus kaca sacara masal ditambahkeun ku $1',
	'nuke-tools' => 'Ieu parabot bisa dipaké pikeun ngahapus masal kaca-kaca nu anyar ditambahkeun ku pamaké atawa IP nu dimaksud. Asupkeun landihan atawa IP pikeun mulut kaca nu rék dihapus:',
	'nuke-submit-user' => 'Jung',
	'nuke-submit-delete' => 'Hapus nu dipilih',
	'right-nuke' => 'Ngahapus masal kaca',
);

/** Swedish (Svenska)
 * @author Lejonel
 * @author Tobulos1
 */
$messages['sv'] = array(
	'nuke' => 'Massradering',
	'nuke-desc' => 'Gör det möjligt för administratörer att [[Special:Nuke|massradera]] sidor',
	'nuke-nopages' => 'Inga nya sidor av [[Special:Contributions/$1|$1]] bland de senaste ändringarna.',
	'nuke-list' => 'Följande sidor har nyligen skapats av [[Special:Contributions/$1|$1]]. Skriv en raderingskommentar och klicka på knappen för att ta bort dem.',
	'nuke-defaultreason' => 'Massradering av sidor skapade av $1',
	'nuke-tools' => 'Det här verktyget gör det möjligt att massradera sidor som nyligen skapats av en viss användare eller IP-adress.
Ange ett användarnamn eller en IP-adress för att se en lista över sidor som kan tas bort.',
	'nuke-submit-user' => 'Visa',
	'nuke-submit-delete' => 'Ta bort valda',
	'right-nuke' => 'Massradera sidor',
	'nuke-select' => 'Välj: $1',
);

/** Swahili (Kiswahili) */
$messages['sw'] = array(
	'nuke-submit-user' => 'Nenda',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'nuke-submit-user' => 'செல்',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'nuke' => 'సామూహిక తొలగింపు',
	'nuke-desc' => 'నిర్వాహకులకు పేజీలను [[Special:Nuke|సామూహికంగా తొలగించే]] సౌలభ్యాన్నిస్తుంది',
	'nuke-nopages' => 'ఇటీవలి మార్పులలో [[Special:Contributions/$1|$1]] సృష్టించిన కొత్త పేజీలేమీ లేవు.',
	'nuke-list' => 'ఈ క్రింద పేర్కొన్న పేజీలను [[Special:Contributions/$1|$1]] ఇటీవలే సృష్టించారు; వాటిని తొలగించడానికి ఎందుకో ఓ వ్యాఖ్య రాసి ఆతర్వాత తొలగించు అన్న బొత్తం నొక్కండి.',
	'nuke-defaultreason' => '$1 చేర్చిన పేజీల యొక్క సామూహిక తొలగింపు',
	'nuke-tools' => 'ఓ ప్రత్యేక వాడుకరి లేదా IP చేర్చిన పేజీలను ఒక్కసారిగా తొలగించడానికి ఈ పనిముట్టు వీలుకల్పిస్తుంది. పేజీల జాబితాని పొందడానికి ఆ వాడుకరిపేరుని లేదా IPని ఇవ్వండి:',
	'nuke-submit-user' => 'వెళ్ళు',
	'nuke-submit-delete' => 'ఎంచుకున్నవి తొలగించు',
	'right-nuke' => 'పేజీలను సామూహికంగా తొలగించడం',
	'nuke-select' => 'ఎంచుకోండి: $1',
	'nuke-maxpages' => 'గరిష్ఠ పుటల సంఖ్య:',
	'nuke-multiplepeople' => 'పలు వాడుకరులు',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'nuke-submit-user' => 'Bá',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'nuke' => 'Ҳазфи дастаҷамъӣ',
	'nuke-desc' => 'Ба  мудирон имкони [[Special:Nuke|ҳазфи дастаҷамъии]] саҳифаҳоро медиҳад',
	'nuke-nopages' => 'Саҳифаи ҷадиде аз [[Special:Contributions/$1|$1]] дар тағйироти охирин вуҷуд надорад.',
	'nuke-list' => 'Саҳифаҳои зерин ба тозагӣ тавассути [[Special:Contributions/$1|$1]] эҷод шудаанд; тавзеҳеро гузоред ва тугмаеро фишор бидиҳед то ин саҳифаҳо ҳазф шаванд.',
	'nuke-defaultreason' => 'Ҳазфи дастиҷамъии саҳифаҳое, ки тавассути $1 эҷод шудаанд',
	'nuke-tools' => 'Ин абзор имкони ҳазфи дастиҷамъии саҳифаҳое, ки ба тозагӣ тавассути як корбар ё  нишонии интернетӣ IP изофашударо фароҳам мекунад. Номи корбар ё нишонии IP вуруд кунед, феҳристи саҳифаҳои барои ҳазфро дастрас кунед:',
	'nuke-submit-user' => 'Бирав',
	'nuke-submit-delete' => 'Интихобшудагон ҳазф шаванд',
	'right-nuke' => 'Ҳазфи дастаҷамъии саҳифаҳо',
);

/** Tajik (Latin) (Тоҷикӣ (Latin))
 * @author Liangent
 */
$messages['tg-latn'] = array(
	'nuke' => "Hazfi dastaçam'ī",
	'nuke-desc' => "Ba  mudiron imkoni [[Special:Nuke|hazfi dastaçam'ii]] sahifahoro medihad",
	'nuke-nopages' => 'Sahifai çadide az [[Special:Contributions/$1|$1]] dar taƣjiroti oxirin vuçud nadorad.',
	'nuke-list' => 'Sahifahoi zerin ba tozagī tavassuti [[Special:Contributions/$1|$1]] eçod şudaand; tavzehero guzored va tugmaero fişor bidihed to in sahifaho hazf şavand.',
	'nuke-defaultreason' => "Hazfi dastiçam'iji sahifahoe, ki tavassuti $1 eçod şudaand",
	'nuke-tools' => "In abzor imkoni hazfi dastiçam'iji sahifahoe, ki ba tozagī tavassuti jak korbar jo  nişoniji internetī IP izofaşudaro faroham mekunad. Nomi korbar jo nişoniji IP vurud kuned, fehristi sahifahoi baroi hazfro dastras kuned:",
	'nuke-submit-user' => 'Birav',
	'nuke-submit-delete' => 'Intixobşudagon hazf şavand',
	'right-nuke' => "Hazfi dastaçam'iji sahifaho",
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'nuke' => 'Köpçülikleýin öçür',
	'nuke-desc' => 'Administratorlara sahypalary [[Special:Nuke|köpçülikleýin öçürme]] ukybyny berýär',
	'nuke-nopages' => 'Soňky üýtgeşmelerde [[Special:Contributions/$1|$1]] tarapyndan döredilen täze sahypa ýok.',
	'nuke-list' => 'Aşakdaky sahypalar ýakyn wagtda [[Special:Contributions/$1|$1]] tarafından oluşturuldu;
bir teswir ýazyň we öçürmek üçin düwmä basyň.',
	'nuke-defaultreason' => '$1 tarapyndan sahypalaryň köpçülikleýin aýrylmagy goşuldy',
	'nuke-tools' => 'Bu gural bir ulanyjy ýa-da IP tarapyndan ýakyn wagtda goşulan sahypalaryň köpçülikleýin öçürilmegine rugsat berýär.
Öçürilmeli sahypalaryň sanawyny almak üçin ulanyjy adyny ýa-da IP-ni giriziň.',
	'nuke-submit-user' => 'Git',
	'nuke-submit-delete' => 'Saýlanylanlary öçür',
	'right-nuke' => 'Sahypalary köpçülikleýin öçür',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'nuke' => 'Malawakang pagbura',
	'nuke-desc' => "Nagbibigay sa mga ''sysop'' ng kakayahang [[Special:Nuke|magburang pangmalawakan]] ng mga pahina",
	'nuke-nopages' => 'Walang bagong mga pahinang ginawa ni [[Special:Contributions/$1|$1]] na nasa loob ng kamakailang mga pagbabago.',
	'nuke-list' => 'Ang sumusunod na mga pahina ay nilikha kamakailan lamang ni [[Special:Contributions/$1|$1]];
maglagay/magpasok ng isang puna (kumento) at pindutin ang pindutan upang mabura ang mga ito.',
	'nuke-list-multiple' => 'Ang sumusunod na mga pahina ay kamakailan lamang nalikha;
maglagay ng isang puna at pindutin ang pindutan upang mabura ang mga ito.',
	'nuke-defaultreason' => 'Idinagdag ni $1 ang malawakang pagbubura ng mga pahina',
	'nuke-tools' => 'Nagpapahintulot ang kagamitang ito upang mabura ng malawakan ang mga pahinang idinagdag kamakailan ng isang ibinigay na tagagamit o tirahan ng IP.
Ipasok ang pangalan ng tagagamit o tirahan ng IP upang makakuha ng isang talaan ng mga pahinang buburahin, o iwanang walang laman para sa lahat ng mga tagagamit.',
	'nuke-submit-user' => 'Gawin',
	'nuke-submit-delete' => 'Pinili ang pagbura',
	'right-nuke' => 'Malawakang burahin ang mga pahina',
	'nuke-select' => 'Piliin: $1',
	'nuke-userorip' => 'Pangalan ng tagagamit, Tirahan ng IP o walang laman:',
	'nuke-maxpages' => 'Pinakamaraming bilang ng mga pahina:',
	'nuke-multiplepeople' => 'maramihang mga tagagamit',
	'nuke-editby' => 'Nilikha ni [[Special:Contributions/$1|$1]]',
);

/** Turkish (Türkçe)
 * @author Erkan Yilmaz
 * @author Joseph
 * @author Srhat
 * @author Tarikozket
 */
$messages['tr'] = array(
	'nuke' => 'Kitlesel silme',
	'nuke-desc' => 'Hizmetlilere, sayfaları [[Special:Nuke|kitlesel silme]] yeteneği verir',
	'nuke-nopages' => 'Son değişikliklerde [[Special:Contributions/$1|$1]] tarafından oluşturulan yeni sayfa yok.',
	'nuke-list' => 'Aşağıdaki sayfalar yakın zamanda [[Special:Contributions/$1|$1]] tarafından oluşturuldu;
bir yorum girin ve silmek için düğmeye basın.',
	'nuke-defaultreason' => '$1 tarafından eklenen sayfaların kitlesel kaldırımı',
	'nuke-tools' => 'Bu araç, bir kullanıcı ya da IP tarafından yakın zamanda eklenen sayfaların kitlesel silinmelerine izin verir.
Silinecek sayfaların listesini almak için kullanıcı adını ya da IPyi girin.',
	'nuke-submit-user' => 'Git',
	'nuke-submit-delete' => 'Seçileni sil',
	'right-nuke' => 'Sayfaları kitlesel olarak sil',
	'nuke-select' => 'Seçilmiş: $1',
);

/** Tatar (Cyrillic) (Татарча/Tatarça (Cyrillic))
 * @author Ильнар
 */
$messages['tt-cyrl'] = array(
	'nuke' => 'Күпләп бетерү',
	'right-nuke' => 'битләрне күпләп бетерү',
);

/** ئۇيغۇرچە (ئۇيغۇرچە)
 * @author Alfredie
 */
$messages['ug-arab'] = array(
	'nuke-submit-user' => 'كۆچۈش',
);

/** Uighur (Latin) (ئۇيغۇرچە / Uyghurche‎ (Latin))
 * @author Jose77
 */
$messages['ug-latn'] = array(
	'nuke-submit-user' => 'Köchüsh',
);

/** Ukrainian (Українська)
 * @author Ahonc
 * @author Тест
 */
$messages['uk'] = array(
	'nuke' => 'Масове вилучення',
	'nuke-desc' => 'Дає адміністраторам можливість [[Special:Nuke|масового вилучення]] сторінок',
	'nuke-nopages' => 'У нових редагуваннях не знайдено сторінок, створених користувачем [[Special:Contributions/$1|$1]].',
	'nuke-list' => 'Наступні сторінки були нещодавно створені користувачем [[Special:Contributions/$1|$1]].
Уведіть коментар і натисніть на кнопку для того, щоб вилучити їх.',
	'nuke-defaultreason' => 'Масове вилучення сторінок, створених користувачем $1',
	'nuke-tools' => "Ця сторінка дозволяє масово вилучати сторінки, створені певним користувачем або з певної IP-адреси.
Уведіть ім'я користувача або IP для того, щоб отримати список створених ним сторінок:",
	'nuke-submit-user' => 'Виконати',
	'nuke-submit-delete' => 'Вилучити обрані',
	'right-nuke' => 'Масове вилучення сторінок',
	'nuke-select' => 'Вибір: $1',
	'nuke-maxpages' => 'Максимальна кількість сторінок:',
	'nuke-editby' => 'Створені [[Special:Contributions/$1|$1]]',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'nuke' => 'Scancelazion de massa',
	'nuke-desc' => 'Consente ai aministradori la [[Special:Nuke|scancelazion in massa]] de le pagine',
	'nuke-nopages' => 'No xe stà catà pagine nove creà da [[Special:Contributions/$1|$1]] tra le modifiche recenti.',
	'nuke-list' => 'Le seguenti pagine le xe stà creà de recente da [[Special:Contributions/$1|$1]]; inserissi un comento e conferma la scancelazion.',
	'nuke-defaultreason' => 'Scancelazion de massa de le pagine creà da $1',
	'nuke-tools' => "Sto strumento el permete la scancelazion in massa de le pagine creà de recente da un determinato utente o IP. Inserissi el nome utente o l'IP par la lista de le pagine da scancelar:",
	'nuke-submit-user' => 'Và',
	'nuke-submit-delete' => 'Scancela la selezion',
	'right-nuke' => 'Scancelassion de massa de le pagine',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'nuke' => 'Massine heitmine',
	'nuke-submit-user' => 'Mäne',
	'nuke-submit-delete' => 'Čuta valitud',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'nuke' => 'Xóa hàng loạt',
	'nuke-desc' => 'Cung cấp cho bảo quản viên khả năng [[Special:Nuke|xóa trang hàng loạt]]',
	'nuke-nopages' => 'Không có trang mới do [[Special:Contributions/$1|$1]] tạo ra trong thay đổi gần đây.',
	'nuke-list' => 'Các trang sau do [[Special:Contributions/$1|$1]] tạo ra gần đây; hãy ghi lý do và nhấn nút để xóa tất cả những trang này.',
	'nuke-list-multiple' => 'Các trang sau được tạo ra gần đây.
Đưa vào lý do và bấm nút để xóa chúng.',
	'nuke-defaultreason' => 'Xóa hàng loạt các trang do $1 tạo ra',
	'nuke-tools' => 'Công cụ này cho phép xóa hàng loạt các trang do một thành viên hoặc người dùng địa chỉ IP nào đó tạo ra gần đây.
Hãy nhập tên thành viên hoặc địa chỉ IP để lấy danh sách các trang sẽ xóa, hoặc để trống để xem các trang của mọi người dùng.',
	'nuke-submit-user' => 'Tìm kiếm',
	'nuke-submit-delete' => 'Xóa các trang đã chọn',
	'right-nuke' => 'Xóa trang hàng loạt',
	'nuke-select' => 'Chọn: $1',
	'nuke-userorip' => 'Tên thành viên, địa chỉ IP, hoặc trống:',
	'nuke-maxpages' => 'Số trang tối đa:',
	'nuke-multiplepeople' => 'hơn một người',
	'nuke-editby' => 'Được tạo bởi [[Special:Contributions/$1|$1]]',
	'nuke-deleted' => "Đã xóa trang '''$1'''.",
	'nuke-not-deleted' => "'''Không thể''' xóa trang [[:$1]].",
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'nuke' => 'Moükön pademi',
	'nuke-desc' => 'Gevon guvanes fägi ad moükön padamödotis',
	'nuke-nopages' => 'Pads nonik fa geban: [[Special:Contributions/$1|$1]] pejaföls binons su lised votükamas nulik.',
	'nuke-list' => 'Pads sököl pejafons brefabüo fa geban: [[Special:Contributions/$1|$1]]; penolös küpeti e klikolös gnobi ad moükön onis.',
	'nuke-defaultreason' => 'Moükam padas fa geban: $1 pejafölas',
	'nuke-tools' => 'Stum at kanon moükön mödoti padas fa geban u ladet-IP semik brefabüo pejafölas. Penolös gebananemi u ladeti-IP ad dagetön lisedi padas moükovik:',
	'nuke-submit-user' => 'Ledunolöd',
	'nuke-submit-delete' => 'Pevalöl ad pamoükön',
	'right-nuke' => 'Moükön padamödoti',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'nuke-submit-user' => 'צייגן',
);

/** Cantonese (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'nuke' => '大量刪除',
	'nuke-desc' => '畀操作員去做[[Special:Nuke|大量刪除]]嘅能力',
	'nuke-nopages' => '響最近更改度無[[Special:Contributions/$1|$1]]所做嘅新頁。',
	'nuke-list' => '下面嘅頁係由[[Special:Contributions/$1|$1]]響之前所寫嘅；記低一個註解再撳掣去刪除佢哋。',
	'nuke-defaultreason' => '大量刪除由$1所開嘅頁',
	'nuke-tools' => '呢個工具容許之前提供咗嘅用戶或者IP加入嘅頁。輸入用戶名或者IP去拎頁一覽去刪除:',
	'nuke-submit-user' => '去',
	'nuke-submit-delete' => '刪除㨂咗嘅',
	'right-nuke' => '大量刪頁',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gaoxuewei
 * @author Hydra
 * @author Liangent
 * @author PhiLiP
 * @author Shinjiman
 * @author Xiaomingyan
 * @author 阿pp
 */
$messages['zh-hans'] = array(
	'nuke' => '大量删除',
	'nuke-desc' => '使系统管理员具有[[Special:Nuke|大量删除]]页面的能力',
	'nuke-nopages' => '在最近更改中没有[[Special:Contributions/$1|$1]]所作的新页面。',
	'nuke-list' => '以下页面是由[[Special:Contributions/$1|$1]]最新创建的；
请留下摘要信息，并点击按钮删除这些页面。',
	'nuke-list-multiple' => '最近创建以下页面 ；
在注释中，点击要删除它们。',
	'nuke-defaultreason' => '大量删除由$1所创建的页面',
	'nuke-tools' => '此工具允许大规模删除指定用户或 IP 地址最近添加的页面。
输入用户名或 IP 地址以获取可删除页面的列表，空白则检索所有用户。',
	'nuke-submit-user' => '提交',
	'nuke-submit-delete' => '删除已选择的',
	'right-nuke' => '大量删除页面',
	'nuke-select' => '选定：$1',
	'nuke-userorip' => 'IP 地址或空白的用户名：',
	'nuke-maxpages' => '最大页面：',
	'nuke-multiplepeople' => '多个用户',
	'nuke-editby' => '与 [[Special:Contributions/$1|$1]]创建的',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Mark85296341
 * @author Shinjiman
 */
$messages['zh-hant'] = array(
	'nuke' => '大量刪除',
	'nuke-desc' => '給操作員作出[[Special:Nuke|大量刪除]]的能力',
	'nuke-nopages' => '在最近更改中沒有 [[Special:Contributions/$1|$1]] 所作的新頁面。',
	'nuke-list' => '以下的頁面是由[[Special:Contributions/$1|$1]]在以前所寫的；記下一個註解再點擊按鈕去刪除它們。',
	'nuke-defaultreason' => '大量刪除由 $1 所建立的頁面',
	'nuke-tools' => '這個工具容許先前提供了的用戶或 IP 位址建立的頁面。輸入用戶名或IP去取得頁面列表以作刪除：',
	'nuke-submit-user' => '執行',
	'nuke-submit-delete' => '刪除已選擇的',
	'right-nuke' => '大量刪除頁面',
	'nuke-select' => '選擇：$1',
);

