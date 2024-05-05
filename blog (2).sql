-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2024, 07:20:57
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `article`
--

CREATE TABLE `article` (
  `id` int(5) NOT NULL,
  `textId` int(5) NOT NULL,
  `textImageId` int(5) NOT NULL DEFAULT 1,
  `textTitleId` int(5) NOT NULL,
  `categoryId` int(5) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `article`
--

INSERT INTO `article` (`id`, `textId`, `textImageId`, `textTitleId`, `categoryId`, `createdtime`) VALUES
(1, 1, 1, 1, 1, '2024-01-10 05:22:56'),
(2, 2, 1, 2, 1, '2024-01-10 05:22:56'),
(3, 3, 2, 3, 1, '2024-01-10 05:24:13'),
(4, 4, 3, 4, 3, '2024-01-10 06:03:04'),
(5, 5, 4, 5, 3, '2024-01-10 06:03:54'),
(6, 6, 5, 6, 3, '2024-01-10 06:04:24'),
(7, 7, 6, 7, 2, '2024-01-10 06:06:25'),
(8, 8, 7, 8, 2, '2024-01-10 06:06:52'),
(9, 9, 8, 9, 2, '2024-01-10 06:07:24'),
(10, 10, 9, 10, 4, '2024-01-10 06:08:06'),
(11, 11, 10, 11, 4, '2024-01-10 06:08:55'),
(12, 12, 11, 12, 4, '2024-01-10 06:09:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articletext`
--

CREATE TABLE `articletext` (
  `id` int(5) NOT NULL,
  `text_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `articletext`
--

INSERT INTO `articletext` (`id`, `text_content`) VALUES
(1, 'C# programlama dilinde değişkenler, veri saklamak ve işlemek için kullanılan temel yapılardan biridir. İşte C# değişkenleri hakkında 20 cümlelik bir açıklama:\r\n\r\nC# dilinde değişkenler, bir değeri depolamak için kullanılan adlandırılmış bellek alanlarıdır.\r\nHer değişken bir veri türüne sahip olmalıdır, bu sayede programlama diline hangi türde veri saklanacağı belirtilir.\r\nC# dilinde en sık kullanılan değişken türleri arasında int (tam sayı), double (kesirli sayı), char (karakter), ve string (metin) bulunur.\r\nDeğişkenler, değer ataması yapılabilir ve bu değerler daha sonra programda kullanılabilir.\r\nC# dilinde değişken isimleri anlamlı olmalı ve genellikle CamelCase (küçük harfle başlayıp her yeni kelime büyük harfle devam eder) şeklinde yazılır.\r\nDeğişken tanımlamak için \"var\" anahtar kelimesi veya belirli bir veri türü kullanılabilir.\r\nC# dilinde değişkenler, bir önceki değeri üzerine yeni bir değer ekleyerek veya çıkararak güncellenebilir.\r\nDeğişkenler, programın farklı noktalarında kullanılabilir ve bu sayede veri saklama ve işleme işlevselliği sağlanabilir.\r\nC# dilinde const anahtar kelimesi kullanılarak sabit değişkenler tanımlanabilir; bu değişkenlerin değeri programın çalışma zamanında değiştirilemez.\r\nDeğişkenler, if-else, switch-case, for, while gibi kontrol yapıları içinde kullanılarak programın akışını yönlendirmek için kullanılır.\r\nC# dilinde değişkenler bellekte bir yer tutar ve bu nedenle bellek yönetimi dikkate alınmalıdır.\r\nBir değişkenin değeri, başka bir değişkene atandığında, değeri kopyalanır ve orijinal değişken etkilenmez.\r\nC# dilinde değişkenlerin kapsamı (scope) tanımlandıkları blok içerisindedir; bu nedenle bir değişken sadece belirli bir kod bloğunda erişilebilir.\r\nDeğişkenler, programcının verileri düzenlemesine ve tutmasına olanak tanır, bu da verilerle daha etkili bir şekilde çalışmayı sağlar.\r\nDeğişkenler, matematiksel operatörler (toplama, çıkarma, çarpma, bölme) ile işlemlere tabi tutulabilir.\r\nC# dilinde değişkenler, sınıflar ve nesnelerle birleştirilerek daha karmaşık veri yapıları oluşturmak için kullanılabilir.\r\nDeğişkenlerin türü, üzerinde işlem yapılacak veri türüne göre belirlenir ve bu, programcının hata yapma olasılığını azaltır.\r\nDeğişkenler, programın mantığı içerisinde geçici değerler saklamak için sıklıkla kullanılır.\r\nDeğişkenler, programcıya veriye erişme, değiştirme ve kontrol etme yetenekleri sunar.\r\nC# dilinde değişkenler, programlama sürecinde veri manipülasyonunu ve yönetimini kolaylaştıran temel yapı taşlarıdı'),
(2, 'C# programlama dilinde diziler, aynı türdeki birden çok veriyi depolamak ve işlemek için kullanılan önemli veri yapılarından biridir. İşte C# dizileri hakkında 20 cümlelik açıklama:\r\n\r\nC# dilinde diziler, aynı türdeki elemanları içeren veri yapılarıdır ve bellekte ardışık bir şekilde saklanır.\r\nDiziler, tek bir ad altında toplanan birden çok değişkeni bir arada tutarak programcılara daha düzenli bir veri yönetimi sunar.\r\nDiziler, farklı veri türlerinde elemanlar içerebilir, ancak bir dizi içindeki tüm elemanlar aynı türde olmalıdır.\r\nC# dilinde diziler, başlangıçta belirlenen bir boyuta sahiptir ve bu boyut, dizinin oluşturulduğu an belirlenir.\r\nDiziler, programcının bellekte daha etkili bir şekilde veri saklamasını sağlar ve erişimi kolaylaştırır.\r\nBir dizi tanımlandığında, her bir elemanın indeksi sıfırdan başlayarak sıralanır.\r\nDizi elemanlarına erişim, indeks kullanılarak yapılır; örneğin, myArray[0] ifadesi dizinin ilk elemanına ulaşır.\r\nC# dilinde çok boyutlu diziler tanımlanabilir, bu da matris veya matris benzeri veri yapılarını oluşturmaya olanak tanır.\r\nDiziler, for, foreach, while gibi döngülerle birlikte kullanılarak elemanlar üzerinde gezinmeyi kolaylaştırır.\r\nDizi elemanları, başlangıçta belirlenen türde veri içermelidir, bu nedenle tip güvenli bir veri yapısıdır.\r\nDiziler, sıralı ve indekslenmiş veri saklama özellikleri ile veriye hızlı erişim imkanı sağlar.\r\nC# dilinde \"Array\" sınıfı, dizilerle ilgili birçok işlevi sağlar ve bu sınıf, dizilerle çalışmayı kolaylaştırır.\r\nDiziler, fonksiyonlar arasında veri paylaşımı ve iletişimi için sıklıkla kullanılır.\r\nC# dilinde \"Length\" özelliği, bir dizinin kaç eleman içerdiğini belirtir.\r\nDiziler, elemanları sıralama, arama ve değiştirme gibi işlemler için kullanılabilir.\r\nC# dilinde \"foreach\" döngüsü, diziler üzerinde elemanları gezinmek için sıkça tercih edilen bir yöntemdir.\r\nDiziler, çok sayıda veriyi organize etmek ve veriler arasında ilişki kurmak için kullanılır.\r\nC# dilinde diziler, programın performansını artırmak için kullanılan etkili bir veri yapılarıdır.\r\nDiziler, bir dizi elemanını topluca işlemek veya bir dizi elemanını başka bir diziye kopyalamak gibi işlemler için uygun araçlar sunar.\r\nC# dilinde diziler, programların daha düzenli, okunabilir ve yönetilebilir olmasına katkı sağlar.'),
(3, 'C# programlama dilinde, classlar nesne tabanlı programlamanın temel yapı taşlarıdır. İşte C# classları hakkında 20 satırlık bir açıklama:\r\n\r\nClass Nedir? C# programlama dilinde, bir nesnenin özelliklerini ve davranışlarını tanımlayan bir yapıdır.\r\n\r\nNesne Yaratma: Bir class\'tan bir nesne yaratmak için new anahtar kelimesi kullanılır.\r\n\r\nÖzellikler (Properties): Classlar, özellikler aracılığıyla nesnenin durumunu tanımlar. Örneğin, bir Araba class\'ı bir özellik olarak \"Hız\" özelliğine sahip olabilir.\r\n\r\nMetodlar: Classlar, nesnenin davranışlarını tanımlayan metodlara sahiptir. Bu metodlar, nesnenin üzerinde gerçekleştirilebilecek işlemleri temsil eder.\r\n\r\nKalıtım (Inheritance): Classlar arasında kalıtım ile bir class\'ın diğer bir class\'tan türemesi sağlanır. Bu, kodun yeniden kullanılabilirliğini artırır.\r\n\r\nPolimorfizm: Classlar arasında polimorfizm, aynı isimli metotların farklı şekillerde davranabilmesini ifade eder.\r\n\r\nKapsülleme (Encapsulation): Classlar, verileri ve metotları bir arada gruplandırarak kapsülleme prensibini destekler.\r\n\r\nConstructors: Class\'ın nesnesi oluşturulurken çalışan özel metotlardır. Nesne yaratılırken başlangıç değerleri atanabilir.\r\n\r\nStatic Members: Belirli bir class\'a özgü olmayan, tüm nesneler tarafından paylaşılan üyelerdir.\r\n\r\nAccess Modifiers: Class üyelerine erişim düzeyini belirler. public, private, protected gibi.\r\n\r\nInterface Kullanımı: Bir class birden fazla interface\'i implement edebilir, bu da çoklu kalıtımı sağlar.\r\n\r\nDelegate ve Event\'ler: Classlar, olayları (events) ve delegeleri kullanarak dinamik etkileşimleri destekler.\r\n\r\nObject Sınıfı: Tüm C# classları, System.Object sınıfından türetilir. Bu sınıf temel metotları (ToString(), Equals(), GetHashCode() gibi) içerir.\r\n\r\nPartial Classlar: Class tanımını birden çok dosyada parçalara bölmek ve bu parçaları birleştirmek için kullanılır.\r\n\r\nIndexers: Class\'lar, dizin (index) gibi davranan özel üyeler (indexers) içerebilir.\r\n\r\nDispose Pattern: Unmanaged kaynakları temizleme amacıyla IDisposable arayüzü ve Dispose metodu kullanılır.\r\n\r\nLINQ Sorguları: Language Integrated Query (LINQ) kullanarak veri koleksiyonları üzerinde sorgular yapma yeteneğini destekler.\r\n\r\nAsenkron Programlama: async ve await anahtar kelimelerini kullanarak asenkron metotlar tanımlayabilir.\r\n\r\nObject Initialization: Nesne yaratma ve başlangıç değerlerini atama işlemlerini tek bir satırda gerçekleştirme imkanı sunar.\r\n\r\nCode Documentation: XML belgelendirme kullanarak, class\'lar ve üyeleri hakkında açıklamalar ekleyerek, kodun anlaşılabilirliğini artırabilir.'),
(4, 'Python\'da değişkenler, veri saklamak ve yönetmek için kullanılan temel yapı taşlarıdır.\r\nDeğişkenler, bir isimle tanımlanır ve bu isim aracılığıyla değerlere erişilir.\r\nPython\'da değişken adları, harf veya alt çizgi ile başlamalıdır ve rakamlar içerebilir, ancak ilk karakter bir rakam olamaz.\r\nDeğişken adları case-sensitive\'dir, yani büyük harf küçük harfle farklılık gösterir.\r\n= operatörü, bir değişkene değer atamak için kullanılır.\r\nPython dinamik tipleme özelliğine sahiptir, yani bir değişkenin türü otomatik olarak belirlenir.\r\nDeğişkenler, sayılar, metinler, listeler, demetler, sözlükler ve daha pek çok veri türü ile kullanılabilir.\r\nBir değişkenin türünü öğrenmek için type() fonksiyonu kullanılabilir.\r\nDeğişkenler, aritmetik işlemlerde, karşılaştırmalarda ve mantıksal operasyonlarda kullanılabilir.\r\nprint() fonksiyonu, bir değişkenin değerini ekrana yazdırmak için kullanılır.\r\ninput() fonksiyonu, kullanıcıdan veri almak için kullanılır ve alınan veri bir değişkene atanabilir.\r\nPython\'da özel anahtar kelimeler değişken adı olarak kullanılamaz.\r\nBir değişkeni silmek için del ifadesi kullanılabilir.\r\n+=, -=, *=, /= gibi kısa form operatörleri, bir değişkenin değerini güncellemek için kullanılabilir.\r\nglobal anahtar kelimesi, bir değişkenin global bir kapsamda tanımlanmasını sağlar.\r\nNone değeri, bir değişkenin atanmamış veya boş olduğunu belirtmek için kullanılabilir.\r\nDeğişkenler, fonksiyonlar içinde yerel veya global kapsamda tanımlanabilir.\r\nlen() fonksiyonu, bir dizi veya metnin uzunluğunu döndürebilir ve bu değer bir değişkene atanabilir.\r\nDeğişkenler, programın akışını kontrol etmek için kullanılan if ve döngü yapıları içinde sıklıkla kullanılır.\r\nPython\'da çoklu değişken ataması, a, b, c = 1, 2, 3 gibi bir yapıyla mümkündür.'),
(5, 'Python\'da liste, dizi olarak bilinen temel bir veri yapısıdır ve birden çok elemanı saklamak için kullanılır.\r\nListeler, köşeli parantez içinde elemanları bulunduran bir veri tipidir.\r\nListe elemanları farklı veri tiplerine sahip olabilir, yani hem sayısal değerler hem de metinsel değerler içerebilir.\r\nListeler, sıralıdır, yani elemanların sırası önemlidir ve indeksleme kullanılarak erişilebilir.\r\nListe indeksleri sıfırdan başlar, yani bir liste içindeki ilk elemanın indeksi 0\'dır.\r\nlen() fonksiyonu, bir listenin uzunluğunu döndürerek listenin eleman sayısını belirlememize yardımcı olur.\r\nListeler, append(), remove(), pop() gibi bir dizi yöntemi ile dinamik olarak değiştirilebilir.\r\nListe elemanlarına, indeks kullanarak erişilebilir ve güncellenebilir. Örneğin, liste[0] = 42 ifadesi, listenin ilk elemanını 42 yapar.\r\nPython\'da dilimleme (slicing) yöntemi kullanılarak bir listenin belirli bir alt kümesine erişilebilir.\r\nListeler, + operatörü ile birleştirilebilir veya * operatörü ile çoğaltılabilir.\r\nin anahtar kelimesi, bir elemanın bir listede olup olmadığını kontrol etmek için kullanılabilir.\r\nmin() ve max() fonksiyonları, bir listedeki en küçük ve en büyük değerleri bulmamıza yardımcı olabilir.\r\nListeler, sort() yöntemi ile sıralanabilir ve reverse() yöntemi ile ters çevrilebilir.\r\nlist() fonksiyonu, bir dizi, demet veya diğer sıralı nesneleri bir liste haline getirmek için kullanılabilir.\r\nListeler, diğer veri yapıları ile birlikte kullanılarak karmaşık veri yapıları oluşturmak için kullanılabilir.\r\nListeler, program içinde veri depolamak, işlemek ve yönetmek için yaygın olarak kullanılır.\r\nListe elemanlarına indis kullanılarak erişim sağlanırken, negatif indisler sondan başlayarak elemanlara erişim sağlar.\r\nListeler, for döngüleri kullanılarak elemanları üzerinde gezinmek için kullanılabilir.\r\nListeler, çok boyutlu dizileri temsil ederek matrisler ve tablolar gibi yapıları modellendirmede kullanılabilir.\r\nListeler, geniş bir standart kütüphane ile birlikte gelir ve bu kütüphane, liste işlemleri için bir dizi fonksiyon içerir.'),
(6, 'Python, web geliştirmek için yaygın olarak kullanılan bir programlama dilidir.\r\nDjango ve Flask gibi Python web çerçeveleri, hızlı ve etkili web uygulamaları oluşturmak için kullanılır.\r\nPython, zengin bir standart kütüphaneye sahiptir ve bu kütüphane web geliştirme sürecini kolaylaştırır.\r\nPython ile yazılmış birçok CMS (Content Management System) ve blog platformu bulunmaktadır.\r\nFlask, hafif ve modüler bir Python web çerçevesidir, küçük ila orta ölçekli projelerde sıklıkla tercih edilir.\r\nDjango, bir MVC (Model-View-Controller) mimarisine dayanan büyük ve kapsamlı bir web çerçevesidir.\r\nPython, web tarayıcıları ile etkileşimli çalışan Selenium gibi araçlarla test otomasyonunda kullanılabilir.\r\nWeb scraping için BeautifulSoup ve Scrapy gibi Python kütüphaneleri veri çekme işlemlerinde kullanılır.\r\nPython, RESTful API\'lar oluşturmak ve tüketmek için yaygın olarak kullanılır.\r\nDjango REST framework, Django tabanlı RESTful API\'lar oluşturmayı kolaylaştıran popüler bir kütüphanedir.\r\nPython, JSON ve XML gibi veri formatlarıyla web servisleri entegre etmek için kullanılabilir.\r\nWeb uygulamaları geliştirmek için kullanılan bir diğer popüler kütüphane ise Pyramid\'dir.\r\nPython, web tarayıcıları ile etkileşimli olarak kullanılan Selenium gibi araçlarla test otomasyonunda kullanılabilir.\r\nFlask ve Django gibi çerçeveler, kullanıcı kimlik doğrulaması, oturum yönetimi ve güvenlik önlemleri gibi konularda sağlam çözümler sunar.\r\nPython, web tarayıcıları ile otomatik testler yapmak için kullanılan bir dizi test çerçevesi içerir.\r\nDjango\'nun sunduğu yönetim arayüzü, web uygulamalarının yönetimini kolaylaştırır ve hızlandırır.\r\nPython ile SQLite, PostgreSQL ve MySQL gibi veritabanları ile etkileşimli web uygulamaları geliştirmek mümkündür.\r\nGeliştiricilere web uygulamalarının performansını artırmak için kullanılan bir dizi önbellekleme stratejisi sunar.\r\nPython\'un dinamik tip sistemine sahip olması, web uygulamalarının esnek ve genişletilebilir olmasına olanak tanır.\r\nPython, web geliştirme topluluğunun sürekli büyümesiyle birlikte, sürekli olarak güncellenen ve geliştirilen bir dil olarak öne çıkar.'),
(7, 'Java programlama dilinde değişkenler, verileri saklamak ve işlemek için kullanılan temel yapı elemanlarıdır.\r\nDeğişkenler, farklı veri tipleriyle (int, double, boolean, String vb.) ilişkilendirilebilir ve bu tiplere uygun değerleri içerir.\r\nJava\'da değişkenler tanımlandıktan sonra tip güvenliği nedeniyle sadece uygun tipteki değerleri alabilirler.\r\nDeğişkenler, program içinde farklı kapsamlarda (local, instance, static) tanımlanabilir ve bu kapsamlara göre erişilebilirler.\r\nDeğişken isimleri Java\'da harf veya alt çizgi ile başlamalıdır ve harf, rakam veya alt çizgi içerebilir.\r\nJava\'nın önceden tanımlanmış anahtar kelimeleri (keywords) değişken isimleri olarak kullanılamaz.\r\nDeğişkenler, değer atama operatörü \"=\" kullanılarak değer alabilir. Örneğin: int sayi = 5;\r\nDeğişkenler, matematiksel ifadeler içinde kullanılarak hesaplamalara katılabilir.\r\nFinal anahtar kelimesi ile tanımlanan değişkenler, bir kez değer atandıktan sonra değiştirilemez.\r\nDeğişkenlerin kapsamı, tanımlandıkları blok veya metot içinde geçerlidir.\r\nJava\'da primitive veri tipleri (int, double, char, boolean) ve referans veri tipleri (String, Object) için değişkenler kullanılabilir.\r\nDeğişkenler, bellekte belirli bir alanı temsil eder ve bu alanda tutulan değerlere erişim sağlar.\r\nJava\'da değişkenlerin ömrü, tanımlandıkları blok veya metotun çalışma süresine bağlıdır.\r\nDeğişkenlerin değerleri, başka değişkenlere atanabilir veya aritmetik operasyonlar ile değiştirilebilir.\r\nDeğişkenlerin tür dönüşümü, bir veri tipinden diğerine geçiş yapma işlemidir ve otomatik veya manuel olarak gerçekleşebilir.\r\nDeğişkenler, programın okunabilirliğini artırmak için anlamlı isimlendirilmelidir.\r\nJava\'da genellikle camelCase notasyonu kullanılarak değişken isimleri oluşturulur.\r\nDeğişkenlerin başlangıç değerleri, tanımlandıkları tiplerin varsayılan değerleriyle otomatik olarak atanır.\r\nDeğişkenler, programın farklı bölümleri arasında veri iletişimini sağlamak için kullanılır.\r\nJava\'da değişkenler, programın dinamik ve esnek olmasını sağlayan temel bileşenlerdir.\r\n\r\n\r\n\r\n'),
(8, 'Java\'da diziler, aynı veri tipindeki elemanların bir araya getirildiği ve tek bir isimle temsil edilen veri yapılarıdır.\r\nDiziler, birçok elemanı saklamak ve tek bir değişken üzerinden erişim sağlamak için kullanılır.\r\nDizi elemanları, sıfırdan başlayarak indekslenir ve her bir eleman farklı bir indeks numarasına sahiptir.\r\nJava\'da diziler, bellekte ardışık bir blokta depolanır ve bu bloğun başlangıç adresi üzerinden erişim sağlanır.\r\nDizi boyutu, oluşturulduğu anda belirlenir ve daha sonra değiştirilemez.\r\nDizi elemanları, tanımlandıkları tiplerine uygun değerler alabilirler.\r\nJava\'da diziler, primitive veri tipleri veya nesne türlerinde olabilir.\r\nDizi oluşturulurken, eleman sayısı ve elemanların başlangıç değerleri belirtilebilir.\r\nDiziler, for, while gibi döngülerle veya foreach döngüsü kullanılarak elemanları üzerinde gezilebilir.\r\nDizilerdeki elemanlara erişim, indeks kullanılarak yapılır. Örneğin: int[] sayilar = {1, 2, 3}; int ilkSayi = sayilar[0];\r\nJava\'da çok boyutlu diziler oluşturulabilir. Örneğin, iki boyutlu bir dizi şu şekilde tanımlanır: int[][] matris = new int[3][3];\r\nDiziler, metodlara argüman olarak geçilebilir veya metodlardan değer olarak döndürülebilir.\r\nDizi elemanlarını sıralamak için Arrays sınıfı kullanılabilir. Örneğin: Arrays.sort(sayilar);\r\nDiziler, veri toplama, sıralama ve arama gibi işlemlerde etkili bir şekilde kullanılır.\r\nJava\'da dinamik diziler için ArrayList sınıfı gibi veri yapıları da bulunmaktadır.\r\nDizilerin eleman sayısını öğrenmek için length özelliği kullanılabilir. Örneğin: int uzunluk = sayilar.length;\r\nDiziler, bellek yönetimi açısından dikkatlice kullanılmalıdır, çünkü boyutları önceden belirlendiği için gereksiz bellek kullanımına neden olabilirler.\r\nDiziler, genellikle aynı türdeki verileri gruplamak ve bu verilere toplu bir şekilde erişim sağlamak için kullanılır.\r\nDiziler, programların performansını artırmak ve veri organizasyonunu düzenlemek için önemli bir rol oynar.\r\nJava\'da diziler, programlamada veri yapıları ve algoritmalar üzerinde çalışırken sıklıkla kullanılan güçlü bir özelliktir.'),
(9, '\r\nJava, web geliştirme alanında geniş bir kullanıma sahip bir programlama dilidir. Java, çeşitli web uygulamaları, sunucu taraflı işlemler ve dinamik içerik oluşturmak için kullanılabilir. Aşağıda, Java\'nın web geliştirmedeki rolüne odaklanan bazı konular ve açıklamalar bulunmaktadır:\r\n\r\nServlet ve JSP: Java Server Pages (JSP) ve Servletler, Java tabanlı web uygulamalarını oluşturmak için kullanılan temel bileşenlerdir. Servletler, HTTP taleplerini işleyen ve dinamik içerik oluşturan Java sınıflarıdır. JSP ise HTML içinde Java kodu kullanmamızı sağlayan bir teknolojidir.\r\n\r\nJava EE (Enterprise Edition): Java\'nın Enterprise Edition, büyük ölçekli ve kurumsal düzeydeki uygulamalar için geliştirilmiş bir versiyonudur. Java EE, Servlet ve JSP\'nin yanı sıra Enterprise JavaBeans (EJB), Java Persistence API (JPA), ve Java Messaging Service (JMS) gibi bir dizi teknoloji içerir.\r\n\r\nSpring Framework: Spring, Java tabanlı web uygulamaları geliştirmek için yaygın olarak kullanılan bir framework\'tür. Spring, bağımlılık enjeksiyonu, hafif konteyner ve bir dizi modül sağlar, bu da geliştirme sürecini kolaylaştırır.\r\n\r\nRESTful Web Servisleri: Java, RESTful web servislerini geliştirmek için kullanılır. JAX-RS (Java API for RESTful Web Services) spesifikasyonu, Java geliştiricilere RESTful servisler oluşturmada standart bir yol sunar.\r\n\r\nHibernate: Hibernate, Java nesnelerini ilişkisel veritabanlarına bağlamak için kullanılan bir ORM (Object-Relational Mapping) framework\'üdür. Bu, veritabanı işlemlerini Java nesneleri üzerinde gerçekleştirmeyi kolaylaştırır.\r\n\r\nApache Struts: Struts, Java web uygulamaları için bir web uygulama framework\'üdür. Model-View-Controller (MVC) tasarım desenini benimser ve genellikle büyük ölçekli projelerde kullanılır.\r\n\r\nMaven ve Gradle: Java projelerini yapılandırmak ve bağımlılıkları yönetmek için Maven ve Gradle gibi yapı araçları sıklıkla kullanılır.\r\n\r\nWeb Güvenliği: Java, web uygulamaları için güvenlik özellikleri içerir. Servlet filtreleri ve Java Authentication and Authorization Service (JAAS), web uygulamalarını güvenli bir şekilde geliştirmek için kullanılabilir.\r\n\r\nTomcat, Jetty, WildFly gibi Sunucular: Java web uygulamalarını dağıtmak için kullanılan çeşitli sunucular bulunmaktadır. Apache Tomcat, Jetty ve WildFly gibi sunucular, Java uygulamalarını çalıştırmak için popüler seçeneklerdir.'),
(10, 'jQuery, JavaScript tabanlı bir kütüphanedir ve web geliştirmeyi kolaylaştırmak için tasarlanmıştır. jQuery, HTML belgeleri üzerinde etkileşimli ve dinamik özellikler eklemek için kullanılır. İşte jQuery değişkenleriyle ilgili 20 cümle:\r\n\r\njQuery Nedir?: jQuery, HTML belgeleri üzerinde gezinme, seçim yapma ve olayları işleme gibi görevleri kolaylaştıran bir JavaScript kütüphanesidir.\r\n\r\n$ İşareti: jQuery, $ işareti ile başlar ve genellikle jQuery işlevlerini çağırmak için kullanılır. Örneğin, $(document).ready(function(){...}).\r\n\r\nSeçiciler (Selectors): jQuery, HTML öğelerini seçmek için güçlü seçici yöntemlere sahiptir. Örneğin, $(\'p\') tüm paragraf öğelerini seçer.\r\n\r\nDeğişken Tanımlama: jQuery ile değişken tanımlamak için var anahtar kelimesini kullanabiliriz. Örneğin, var myVar = 42;.\r\n\r\nDOM Manipülasyonu: jQuery ile HTML belgesinin içeriğini değiştirebiliriz. Örneğin, $(\'p\').text(\'Yeni metin\');.\r\n\r\nOlay İşleyicileri: jQuery, HTML öğeleri üzerinde olayları (click, hover, vs.) dinlemek ve işlemek için kullanılır. Örneğin, $(\'button\').click(function(){...});.\r\n\r\nAnimasyonlar: jQuery, öğeleri animasyonlarla göstermek, gizlemek veya değiştirmek için kullanılabilir. Örneğin, $(\'div\').fadeIn();.\r\n\r\nAjax İşlemleri: jQuery, Ajax çağrıları yapmak ve sunucu ile veri alışverişi yapmak için kullanılır. Örneğin, $.ajax({url: \'veri.json\', success: function(data){...}});.\r\n\r\nDeğişken İsimlendirme: jQuery\'de değişken isimlendirmesi genellikle camelCase stiline uyar. Örneğin, var myVariableName;.\r\n\r\nAttribute (Özellik) Değişiklikleri: jQuery, HTML öğelerinin özelliklerini değiştirmek için kullanılabilir. Örneğin, $(\'img\').attr(\'src\', \'yeni_resim.jpg\');.\r\n\r\nFiltreleme: jQuery, seçicilere filtreler ekleyerek belirli öğeleri seçmemize olanak tanır. Örneğin, $(\'li:first\') ilk li öğesini seçer.\r\n\r\nDeğişkenler Arası Atama: jQuery\'de bir değişkenin değeri başka bir değişkene atanabilir. Örneğin, var a = 5; var b = a;.\r\n\r\nPlugin Kullanımı: jQuery, birçok eklenti (plugin) ile genişletilebilir. Örneğin, bir galeri eklentisi kullanmak için $(\'div\').myGallery();.\r\n\r\nDeğişkenlerde Veri Türleri: jQuery\'de değişkenlerde veri türleri genellikle dinamiktir. Örneğin, var x = 42; x, otomatik olarak bir sayı türüne atanır.\r\n\r\nŞartlı İfadeler: jQuery içinde şartlı ifadeler kullanarak belirli durumlarda farklı kod bloklarını çalıştırabiliriz. Örneğin, if (x > 10) {...} else {...}.\r\n\r\nDeğişkenlerin İçeriği: jQuery\'de değişkenlerin içeriğini belirlemek ve almak için .html(), .text() gibi fonksiyonlar kullanılabilir.\r\n\r\njQuery Objeleri: jQuery, HTML öğelerini jQuery objelerine dönüştürerek üzerinde çeşitli işlemler yapmamızı sağlar. Örneğin, var myElement = $(\'div\');.\r\n\r\nDeğişkenlerle Döngüler: jQuery içinde döngüler kullanarak belirli işlemleri yineleyebiliriz. Örneğin, $(\'li\').each(function(index, element){...});.\r\n\r\nDeğişkenlerin İçeriğini Güncelleme: jQuery ile bir değişkenin içeriğini güncellemek için .html(), .text() gibi fonksiyonlar kullanılabilir.\r\n\r\nDeğişkenlerin Kapsamı: jQuery içinde değişkenlerin kapsamı genellikle lokaldir, yani tanımlandıkları fonksiyon içinde geçerlidir.'),
(11, 'jQuery, web soketleriyle (web sockets) etkileşimli web uygulamaları geliştirmek için kullanılan bir JavaScript kütüphanesidir. İşte jQuery ve web soketleri ile ilgili 20 cümle:\r\n\r\nWeb Soketleri Nedir?: Web soketleri, iki yönlü (bidirectional) iletişim kurmamızı sağlayan bir iletişim protokolüdür ve gerçek zamanlı uygulamalar geliştirmek için kullanılır.\r\n\r\njQuery ve Web Soketleri: jQuery, web soketleri üzerinde etkileşimli uygulamalar geliştirmek için kullanılabilecek bir dizi işlev içerir.\r\n\r\nSoket Bağlantısı Kurma: jQuery ile web soket bağlantısı kurmak için $.websocket veya benzeri bir eklenti kullanılabilir.\r\n\r\nWeb Soket Adresi Belirleme: Web soketine bağlanırken, soketin hedef adresini belirlemek için jQuery içinde uygun fonksiyonları kullanabiliriz.\r\n\r\nBağlantı Olayları: jQuery ile web soket bağlantısının durumuyla ilgili olayları dinleyebiliriz, örneğin, bağlantı kurulduğunda veya kapandığında.\r\n\r\nVeri Gönderme: Web soketi üzerinden veri göndermek için jQuery ile özel fonksiyonları kullanabiliriz.\r\n\r\nVeri Alma: jQuery ile web soketi üzerinden gelen verileri dinleyebilir ve işleyebiliriz.\r\n\r\nSoket İşlemlerini İptal Etme: Belirli bir web soket bağlantısını iptal etmek için jQuery içinde uygun fonksiyonları kullanabiliriz.\r\n\r\nSoket Olaylarını İşleme: jQuery, web soketlerindeki olayları işlemek için özel fonksiyonlar ve işlevler içerir.\r\n\r\nGelişmiş Hata Kontrolü: jQuery ile web soket bağlantısı sırasında oluşabilecek hataları işlemek için uygun kontrol mekanizmalarını kurabiliriz.\r\n\r\nJSON Veri Gönderme ve Alma: jQuery, web soket üzerinden JSON verisi gönderip almak için kullanışlı fonksiyonlara sahiptir.\r\n\r\nSunucu ile İki Yönlü İletişim: Web soketleri, sunucu ile istemci arasında iki yönlü iletişim kurmamıza olanak tanır, bu da gerçek zamanlı uygulamalarda büyük bir avantajdır.\r\n\r\nGüvenlik Uygulamaları: jQuery ile web soket kullanırken güvenlik önlemlerini almak önemlidir ve SSL/TLS gibi protokollerle güvenli bağlantılar sağlayabiliriz.\r\n\r\nÇoklu Soket Bağlantıları: jQuery ile aynı sayfa üzerinde birden fazla web soket bağlantısı kurabilir ve yönetebiliriz.\r\n\r\nSoket Durumu Göstergesi: Kullanıcılara web soket bağlantısının durumu hakkında bilgi vermek için jQuery ile durum göstergeleri oluşturabiliriz.\r\n\r\nSunucu ile İstemci Arasında Veri Senkronizasyonu: Web soketleri, sunucu ile istemci arasında veri senkronizasyonunu kolaylaştırır ve jQuery ile bu verileri etkili bir şekilde yönetebiliriz.\r\n\r\nMesaj Yönlendirme: jQuery ile web soket bağlantısı üzerinden mesaj yönlendirme ve iletişim kurma yeteneklerini kullanabiliriz.\r\n\r\nÇerez (Cookie) Yönetimi: Web soket kullanırken çerez yönetimi önemlidir ve jQuery ile bu konuda çeşitli işlemler gerçekleştirebiliriz.\r\n\r\nMobil Uyumlu Web Soketleri: jQuery ile geliştirilen web soket uygulamalarını, mobil cihazlara uyumlu hale getirebiliriz.\r\n\r\nİleri Düzey Web Soket İşlemleri: jQuery ile web soket bağlantılarını daha karmaşık senaryolara uyarlamak için gelişmiş fonksiyonlar ve eklentiler kullanabiliriz.'),
(12, 'jQuery ve AJAX, web geliştirme süreçlerinde etkili ve hızlı veri iletişimi sağlayan önemli araçlardır. İşte jQuery AJAX ile ilgili 20 cümle:\r\n\r\nAJAX Nedir?: AJAX (Asynchronous JavaScript and XML), web sayfaları aracılığıyla arka planda sunucu ile iletişim kurmamıza olanak tanıyan bir tekniktir.\r\n\r\njQuery ve AJAX: jQuery, AJAX işlemlerini kolaylaştıran bir JavaScript kütüphanesidir.\r\n\r\n$.ajax() Fonksiyonu: jQuery içinde yer alan $.ajax() fonksiyonu, AJAX isteklerini yönetmek için kullanılır.\r\n\r\nVeri Gönderme (POST): $.ajax() fonksiyonu ile POST istekleri gönderebilir ve sunucuya veri iletebiliriz.\r\n\r\nVeri Alma (GET): $.ajax() fonksiyonu ile GET istekleri yapabilir ve sunucudan veri alabiliriz.\r\n\r\nBağlantı Ayarları: $.ajax() fonksiyonu içinde bağlantı ayarlarını (örneğin, URL, metod, veri türü) belirleyebiliriz.\r\n\r\nAsenkron İşlem: AJAX, asenkron (asynchronous) bir yapıya sahiptir, bu da sayfanın yeniden yüklenmeden isteklerin gerçekleşmesini sağlar.\r\n\r\nOlay İşleyicileri: AJAX işlemleri sırasında gerçekleşen olayları (örneğin, başarı veya hata durumları) yakalayabilir ve özel işlemler uygulayabiliriz.\r\n\r\nJSON Veri ile Çalışma: AJAX ile JSON formatında veri alışverişi sıkça kullanılır ve jQuery bu tür verileri kolayca işleyebilir.\r\n\r\nGeri Dönüş Formatı Ayarları: $.ajax() fonksiyonu içinde sunucudan dönen verinin formatını belirleyebiliriz (JSON, XML, HTML vb.).\r\n\r\nHata Kontrolü: AJAX işlemleri sırasında oluşan hataları ele almak ve kullanıcıya uygun geri bildirim sağlamak önemlidir.\r\n\r\nÇapraz Alan İstekleri (CORS): AJAX ile çapraz alan (cross-origin) istekleri yapabilmek için uygun başlıkları ayarlamak gerekir.\r\n\r\nForm Verilerini Gönderme: Sayfadaki bir formun içeriğini $.ajax() ile kolayca sunucuya iletebiliriz.\r\n\r\nVeri Güvenliği: AJAX kullanırken, sunucudan veya istemciden gelen verilere karşı güvenlik önlemleri almalıyız.\r\n\r\nİlerleme Durumu Göstergesi: Büyük veri transferleri sırasında kullanıcıya ilerleme durumu göstergesi sunmak, kullanıcı deneyimini artırır.\r\n\r\nÇağrı Sırasında Bekleme Ekranı: AJAX çağrısı yapılırken sayfa üzerinde kullanıcıya bekletme ekranı göstermek, kullanıcıyı bilgilendirebilir.\r\n\r\nSunucu Tarafında İşlemler: AJAX isteği sonrasında sunucu tarafında özel işlemler yapmak mümkündür.\r\n\r\nZaman Aşımı Kontrolü: AJAX çağrıları için zaman aşımı süresini belirleyerek, beklenen cevap alınamazsa uygun önlemleri alabiliriz.\r\n\r\nDosya Yükleme (File Upload): AJAX ile dosya yükleme işlemlerini yönetmek için uygun ayarlamalar yapabiliriz.\r\n\r\nUygulama İçi AJAX Kullanımı: jQuery ile AJAX, birçok farklı uygulama senaryosunda kullanılabilir, örneğin, veri güncelleme, canlı arama, sınırsız kayıt listeleme vb.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articletitle`
--

CREATE TABLE `articletitle` (
  `id` int(11) NOT NULL,
  `title_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `articletitle`
--

INSERT INTO `articletitle` (`id`, `title_content`) VALUES
(1, 'c# Değişkenler'),
(2, 'c# Diziler'),
(3, 'c# Class Yapısı'),
(4, 'Değişkenler'),
(5, 'Diziler'),
(6, 'Web'),
(7, 'Java Değişkenler'),
(8, 'Diziler'),
(9, 'Web'),
(10, 'Değişkenler'),
(11, 'Web Socket'),
(12, 'Ajax');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(1, 'C#'),
(2, 'JAVA'),
(3, 'PYTHON'),
(4, 'JQUERY');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  `articleId` int(5) NOT NULL,
  `commentTextId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `userId`, `articleId`, `commentTextId`) VALUES
(1, 2, 3, 1),
(2, 2, 3, 2),
(3, 4, 3, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `commenttext`
--

CREATE TABLE `commenttext` (
  `id` int(5) NOT NULL,
  `commentText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `commenttext`
--

INSERT INTO `commenttext` (`id`, `commentText`) VALUES
(1, 'Selam!! İlk Yorum '),
(2, 'Selamm!! İkinci Yorum'),
(3, 'Selam!!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `image`
--

CREATE TABLE `image` (
  `id` int(5) NOT NULL,
  `imageName` varchar(10) NOT NULL,
  `imagePath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `image`
--

INSERT INTO `image` (`id`, `imageName`, `imagePath`) VALUES
(1, 'e01dfc3f2a', '../assets/img/e01dfc3f2ad3fdbfe671dcbffeb87bab.webp'),
(2, 'c7342ad498', '../assets/img/c7342ad4985f2df232409e97c774c88c.webp'),
(3, '676fdf55bb', '../assets/img/676fdf55bb27aa80d3f506560f2fd471.webp'),
(4, '786477fb31', '../assets/img/786477fb31a00b5d40fd656a30690eeb.webp'),
(5, '8a9c162125', '../assets/img/8a9c1621258bb8dae2d2a58c03ef9734.webp'),
(6, '0079ac5a4d', '../assets/img/0079ac5a4dad034b3ebb0d9fdeb3f612.webp'),
(7, '8a69b28768', '../assets/img/8a69b28768b92b89dc0c233f5d8963f3.webp'),
(8, '9e034925eb', '../assets/img/9e034925eb5203056d24ba5b3c9d3c5d.webp'),
(9, 'c283320709', '../assets/img/c283320709897451ea4e92a4a6e3255b.jpg'),
(10, '209a006207', '../assets/img/209a00620793e39f3785c54eb56ca977.jpg'),
(11, '834db9c0c7', '../assets/img/834db9c0c7817f881435a318a0dcf1a7.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(5) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `userlogin`
--

INSERT INTO `userlogin` (`id`, `mail`, `password`, `status`) VALUES
(1, 'admin', '1234', b'1'),
(2, 'kaantrrkoglu@gmail.com', '1234', b'0'),
(3, 'hakantancan09@gmail.com', '1234', b'0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profileImageId` int(5) NOT NULL DEFAULT 1,
  `mail` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `mailVerified` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surName`, `password`, `profileImageId`, `mail`, `phone`, `mailVerified`) VALUES
(2, 'Kaan', 'TÜRKOĞLU', '1234', 1, 'admin', '5459039584', b'1'),
(3, 'Kaan ', 'Türkoğlu', '1234', 1, 'kaantrrkoglu@gmail.com', '5459039584', b'1'),
(4, 'hakan', 'tancan', '1234', 1, 'hakantancan09@gmail.com', '123456789', b'1');

--
-- Tetikleyiciler `users`
--
DELIMITER $$
CREATE TRIGGER `giriseekle` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT INTO userlogin (mail, password) VALUES (NEW.mail, new.password);
END
$$
DELIMITER ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `articletext`
--
ALTER TABLE `articletext`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `articletitle`
--
ALTER TABLE `articletitle`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `commenttext`
--
ALTER TABLE `commenttext`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `article`
--
ALTER TABLE `article`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `articletext`
--
ALTER TABLE `articletext`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `articletitle`
--
ALTER TABLE `articletitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `commenttext`
--
ALTER TABLE `commenttext`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `image`
--
ALTER TABLE `image`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
