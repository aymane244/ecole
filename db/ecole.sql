-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 août 2022 à 23:05
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `abs_id` int(11) NOT NULL,
  `abs_etudiant` int(11) NOT NULL,
  `abs_date` date NOT NULL,
  `abs_formation` int(11) NOT NULL,
  `abs_matiere` int(11) NOT NULL,
  `abs_absence` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_prenom` varchar(50) NOT NULL,
  `adm_nom` varchar(50) NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_password` varchar(50) NOT NULL,
  `adm_image` varchar(100) NOT NULL,
  `adm_registre` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_titre` varchar(200) NOT NULL,
  `art_titre_arab` varchar(200) NOT NULL,
  `art_texte` text NOT NULL,
  `art_texte_arab` text NOT NULL,
  `art_image` varchar(200) NOT NULL,
  `art_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_titre`, `art_titre_arab`, `art_texte`, `art_texte_arab`, `art_image`, `art_ajout`) VALUES
(11, 'Carte de conducteur professionnel : le délai d’inscription prolongé à fin décembre 2022', 'بطاقة سائق محترف: تم تمديد الموعد النهائي للتسجيل حتى نهاية ديسمبر 2022', '<p>Dans le cadre de la mise en &oelig;uvre des engagements pris par le minist&egrave;re du Transport et de la Logistique, concernant la gratuit&eacute; des formations obligatoires pour l&rsquo;obtention de la carte de conducteur professionnel, et &eacute;tant donn&eacute; que l&rsquo;op&eacute;ration d&rsquo;inscription se poursuit encore, et pour r&eacute;pondre aux dol&eacute;ances des professionnels, le minist&egrave;re porte &agrave; la connaissance de l&rsquo;ensemble des conducteurs professionnels exer&ccedil;ant la conduite professionnelle et souhaitant l&rsquo;obtention de ladite carte, que le d&eacute;lai d&rsquo;inscription &agrave; cette op&eacute;ration a &eacute;t&eacute; prorog&eacute; jusqu&rsquo;au 31 d&eacute;cembre 2022, indique le minist&egrave;re dans un communiqu&eacute;.<br><br>Cette op&eacute;ration s&rsquo;exerce selon les m&ecirc;mes conditions fix&eacute;es auparavant dans les communiqu&eacute;s publi&eacute;s par le minist&egrave;re &agrave; cet &eacute;gard, souligne la m&ecirc;me source.<br><br>Par cons&eacute;quent, il a &eacute;t&eacute; d&eacute;cid&eacute; de reporter le contr&ocirc;le relatif &agrave; la possession de la carte de conducteur professionnel au 1er janvier 2023, rel&egrave;ve le communiqu&eacute;, notant que ce contr&ocirc;le sera effectu&eacute; sur la base d&rsquo;une carte de conducteur professionnel en cours de validit&eacute;, ou d&rsquo;un r&eacute;c&eacute;piss&eacute; de d&eacute;p&ocirc;t attestant l\'inscription &agrave; une formation pour l&rsquo;obtention de ladite carte avant le 1er janvier 2023.</p>', '<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">في إطار تنفيذ الالتزامات التي تعهدت بها وزارة النقل واللوجستيات بشأن التدريب الإجباري المجاني للحصول على بطاقة السائق المحترف ، ونظراً لاستمرار عملية التسجيل مرة أخرى ، وللرد على شكاوى المهنيين ، تبلغ الوزارة وقالت الوزارة في بيان إن جميع السائقين المحترفين الذين يمارسون القيادة الاحترافية ويرغبون في الحصول على البطاقة المذكورة ، تم تمديد الموعد النهائي للتسجيل لهذه العملية حتى 31 ديسمبر 2022.</p>\r\n<p dir=\"rtl\" data-placeholder=\"Traduction\">وأوضح المصدر ذاته أن هذه العملية تتم وفق نفس الشروط التي سبق بيانها في البيانات الصحفية التي نشرتها الوزارة بهذا الشأن.</p>\r\n<p dir=\"rtl\" data-placeholder=\"Traduction\">وبناءً على ذلك ، تقرر تأجيل المراقبة المتعلقة بحيازة بطاقة السائق المحترف إلى 1 يناير 2023 ، كما يشير البيان الصحفي ، مشيرًا إلى أن هذا التحكم سيتم على أساس بطاقة سائق محترف سارية المفعول.</p>\r\n<p dir=\"rtl\" data-placeholder=\"Traduction\">إيصال إيداع يشهد على التسجيل للتدريب للحصول على البطاقة المذكورة قبل 1 يناير 2023.</p>', 'OFF.jpg', '2022-07-05'),
(12, 'Couverture sociale des conducteurs professionnels', 'التغطية الاجتماعية / السائقين المحترفين', '<p><em>Le Conseil de gouvernement, r&eacute;uni jeudi sous la pr&eacute;sidence du Chef de gouvernement, Aziz Akhannouch, a approuv&eacute; le projet de d&eacute;cret n&deg;2.22.190, portant application de la loi n&deg; 98.15 relative au r&eacute;gime de l\'assurance maladie obligatoire (AMO) de base et de la loi n&deg; 99.15 instituant un r&eacute;gime de pensions pour les cat&eacute;gories des professionnels, des travailleurs ind&eacute;pendants et des personnes non salari&eacute;es exer&ccedil;ant une activit&eacute; lib&eacute;rale, en ce qui concerne les conducteurs ayant une carte de conducteur professionnel.</em></p>\r\n<p>Ce texte, qui s\'inscrit dans la continuit&eacute; de l\'action gouvernementale pour la mise en &oelig;uvre du chantier strat&eacute;gique de la g&eacute;n&eacute;ralisation de la couverture sociale, vise &agrave; d&eacute;terminer les modalit&eacute;s d&rsquo;application des r&eacute;gimes d&rsquo;AMO et de pensions pour les conducteurs titulaires d&rsquo;une carte de conducteur professionnel, &agrave; l&rsquo;exception des chauffeurs de taxi et ce, suite aux r&eacute;unions consultatives tenues par le minist&egrave;re du Transport et de la Logistique avec les repr&eacute;sentations professionnelles de cette cat&eacute;gories, a indiqu&eacute; le ministre d&eacute;l&eacute;gu&eacute; charg&eacute; des Relations avec le parlement, porte-parole du gouvernement, Mustapha Baitas, lors d\'un point de presse &agrave; l\'issue du Conseil.&nbsp;</p>\r\n<p>En vertu de ce projet de d&eacute;cret, le revenu forfaitaire pour un conducteur qui n&rsquo;est pas propri&eacute;taire d&rsquo;un v&eacute;hicule autoris&eacute; &agrave; &ecirc;tre utilis&eacute; dans le transport routier est fix&eacute; &agrave; 1x le salaire minimum interprofessionnel garanti (SMIG) dans les secteurs non agricoles, d&eacute;termin&eacute; en application des dispositions de l\'article 356, de la loi n&deg; 65.99 relative au code de travail, multipli&eacute; par la dur&eacute;e normale annuelle de travail dans les activit&eacute;s non agricoles fix&eacute;e par l&rsquo;article n.184 de ladite Loi, a pr&eacute;cis&eacute; M. Baitas.</p>\r\n<p>Pour les conducteurs qui poss&egrave;dent un v&eacute;hicule autoris&eacute; &agrave; &ecirc;tre utilis&eacute; dans le transport routier, le texte fixe le revenu forfaitaire &agrave; 1.3x la valeur mentionn&eacute;e, a ajout&eacute; le ministre.</p>\r\n<p>Et de noter que les dispositions de ce projet de d&eacute;cret consid&egrave;rent le minist&egrave;re du Transport et de la Logistique- D&eacute;partement du Transport- l&rsquo;organe de liaison avec la Caisse nationale de s&eacute;curit&eacute; sociale (CNSS) pour lui fournir les informations n&eacute;cessaires &agrave; l&rsquo;inscription des conducteurs concern&eacute;s, la d&eacute;termination de versement des cotisations &agrave; pr&eacute;lever chaque mois, les modalit&eacute;s d\'inscription, ainsi que de la date &agrave; partir de laquelle l\'inscription prend effet au 1er mai 2022, avec possibilit&eacute; d\'inscription avant cette date.</p>', '<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\"><em>وافق مجلس الحكومة ، المنعقد يوم الخميس برئاسة رئيس الحكومة ، عزيز أخنوش ، على مشروع مرسوم رقم 2.22.190 بتنفيذ القانون رقم 98.15 المتعلق بنظام التأمين الصحي الإجباري (AMO) والقانون رقم 99.15. إنشاء نظام معاشات لفئات المهنيين والعاملين لحسابهم الخاص والأشخاص العاملين لحسابهم الخاص الذين يمارسون نشاطاً ليبرالياً ، فيما يتعلق بالسائقين الحاملين لبطاقة سائق محترف.</em></p>\r\n<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">يهدف هذا النص ، الذي يعد جزءًا من استمرار العمل الحكومي لتنفيذ المشروع الاستراتيجي لتعميم التغطية الاجتماعية ، إلى تحديد شروط تطبيق نظام AMO وأنظمة التقاعد للسائقين حاملي بطاقة السائق المحترف ، مع باستثناء سائقي سيارات الأجرة وذلك عقب الاجتماعات التشاورية التي عقدتها وزارة النقل واللوجستيات مع الممثلين المهنيين من هذه الفئة ، أوضح الوزير المفوض المكلف بالعلاقات مع البرلمان المتحدث الرسمي باسم الحكومة مصطفى بيتاس خلال إيجاز صحفي بعد المجلس.</p>\r\n<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">بموجب مشروع المرسوم هذا ، يتم تحديد الدخل الثابت للسائق الذي ليس مالكًا لسيارة مصرح باستخدامها في النقل البري بمقدار 1x الحد الأدنى للأجور المهنية المضمونة (SMIG) في القطاعات غير الزراعية ، والتي يتم تحديدها وفقًا لـ أحكام المادة 356 من القانون رقم 65.99 المتعلق بقانون العمل ، مضروبة في وقت العمل السنوي العادي في الأنشطة غير الزراعية المنصوص عليها في المادة رقم 184 من القانون المذكور ، حدد السيد بيتاس.</p>\r\n<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">وأضاف الوزير أنه بالنسبة للسائقين الذين يمتلكون سيارة مصرح لها باستخدامها في النقل البري ، فإن النص يحدد الدخل الثابت عند 1.3 ضعف القيمة المذكورة.</p>\r\n<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">والإشارة إلى أن أحكام مشروع المرسوم هذا تعتبر وزارة النقل والإمداد - دائرة النقل - جهة الاتصال مع الصندوق الوطني للضمان الاجتماعي (CNSS) لتزويدها بالمعلومات اللازمة لتسجيل السائقين المعنيين ، تحديد دفع الاشتراكات التي سيتم خصمها كل شهر ، وإجراءات التسجيل ، وكذلك تاريخ بدء سريان التسجيل في 1 مايو 2022 ، مع إمكانية التسجيل قبل هذا التاريخ.</p>', 'CNSS.jpg', '2022-07-06');

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `att_id` int(11) NOT NULL,
  `att_etudiant` int(11) NOT NULL,
  `att_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `com_id` int(11) NOT NULL,
  `com_nom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `com_prenom` varchar(200) CHARACTER SET utf8 NOT NULL,
  `com_comentaire` text CHARACTER SET utf8 NOT NULL,
  `com_article` int(11) NOT NULL,
  `com_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `con_nom` varchar(200) NOT NULL,
  `con_email` varchar(200) NOT NULL,
  `con_sujet` varchar(200) NOT NULL,
  `con_message` text NOT NULL,
  `con_envoie` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `dip_id` int(11) NOT NULL,
  `dip_etudiant` int(11) NOT NULL,
  `dip_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `douane`
--

CREATE TABLE `douane` (
  `dou_id` int(11) NOT NULL,
  `dou_nom` varchar(200) NOT NULL,
  `dou_res_nom` varchar(200) NOT NULL,
  `dou_res_email` varchar(200) NOT NULL,
  `dou_res_message` text NOT NULL,
  `dou_res_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `etud_id` int(11) NOT NULL,
  `etud_nom` varchar(200) NOT NULL,
  `etud_nom_arab` varchar(200) NOT NULL,
  `etud_prenom` varchar(200) NOT NULL,
  `etud_prenom_arabe` varchar(200) NOT NULL,
  `etud_email` varchar(200) NOT NULL,
  `etud_telephone` varchar(200) NOT NULL,
  `etud_motdepasse` varchar(200) NOT NULL,
  `etud_cin` varchar(200) NOT NULL,
  `etud_formation` int(11) NOT NULL,
  `etud_naissance` date NOT NULL,
  `etud_lieu_naissance` varchar(50) NOT NULL,
  `etud_adress` varchar(200) NOT NULL,
  `etud_permis` varchar(200) NOT NULL,
  `etud_cat_permis` varchar(200) NOT NULL,
  `etude_carte_pro` varchar(200) NOT NULL,
  `etud_permis_obt` date NOT NULL DEFAULT current_timestamp(),
  `etud_scan_cin` varchar(200) NOT NULL,
  `etud_scan_permis` varchar(200) NOT NULL,
  `etud_scan_visite` varchar(200) NOT NULL,
  `etud_promos` int(11) DEFAULT NULL,
  `etud_image` varchar(500) NOT NULL,
  `etud_inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `for_id` int(11) NOT NULL,
  `for_nom` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `for_nom_arab` varchar(200) NOT NULL,
  `for_pres` text NOT NULL,
  `for_pres_arab` text NOT NULL,
  `for_descr` text NOT NULL,
  `for_desc_arab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`for_id`, `for_nom`, `for_nom_arab`, `for_pres`, `for_pres_arab`, `for_descr`, `for_desc_arab`) VALUES
(16, 'Formation de qualification initiale minimale Obligatoire (FQIMO)', '(FQIMO) الحد الأدنى الإلزامي من تدريب التأهيل الأولي', '<p>Aucune formation ou dipl&ocirc;me n&rsquo;est requis pour&nbsp;<strong>devenir</strong> chauffeur professionnel. Il suffit de poss&eacute;der le permis de conduire depuis plus de deux ans. La Formation Initiale Minimum Obligatoire (FQIMO) n&rsquo;est attendue que pour le transport de marchandises ou pour les transports en commun.</p>', '<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">لا يتطلب الأمر تكوينا أو دبلومًا مسبقا لتصبح <strong>سائقًا مهني</strong>. يكفي أن يكون لديك رخصة قيادة لأكثر من عامين. الحد الأدنى الإلزامي من التدريب الأولي (FQIMO) هي فقط لنقل البضائع أو النقل العام.</p>\r\n<p><span style=\"font-size: 12pt;\"><br><br></span></p>', '<p>OJECTIFS DE LA FORMATION</p>\r\n<p>&Ecirc;tre capable d&rsquo;exercer le m&eacute;tier de conducteur routier marchandises dans le respect de la s&eacute;curit&eacute; et de la r&eacute;glementation professionnelle en assurant un service de qualit&eacute;.</p>\r\n<ul>\r\n<li>&Ecirc;tre capable de conduire un v&eacute;hicule de transport de marchandises selon des principes professionnels.</li>\r\n<li>Avoir des notions sur la conduite rationnelle.</li>\r\n<li>Savoir utiliser l&rsquo;ensemble des documents n&eacute;cessaires &agrave; la r&eacute;alisation des transports.</li>\r\n<li>Assurer les bases professionnelles n&eacute;cessaires pour exercer l&rsquo;emploi de conducteur routier de marchandises eu &eacute;gard aux conditions g&eacute;n&eacute;rales de la pratique du m&eacute;tier et des conditions particuli&egrave;res de s&eacute;curit&eacute;.</li>\r\n<li>Connaitre les applications r&egrave;glementaires r&eacute;gissant la profession.</li>\r\n<li>Avoir connaissance des r&egrave;gles et principes relatifs &agrave; la sant&eacute;, la s&eacute;curit&eacute; routi&egrave;re et la s&eacute;curit&eacute; environnementale.</li>\r\n<li>&Ecirc;tre conscient de l&rsquo;importance du monde du transport et des attitudes positives &agrave; d&eacute;velopper &agrave; son &eacute;gard.</li>\r\n</ul>\r\n<p>ENCADREMENT</p>\r\n<p>Enseignants r&eacute;f&eacute;renc&eacute;s par d&eacute;cision administrative dans le cadre de l&rsquo;agr&eacute;ment de l&rsquo;organisme de formation et de l\'Acad&eacute;mie.</p>\r\n<p>METHODE ET MOYENS PEDAGOGIQUE</p>\r\n<ul>\r\n<li>M&eacute;thodes actives adapt&eacute;es &agrave; la formation des adultes.</li>\r\n<li>Formation th&eacute;orique et pratique.</li>\r\n</ul>\r\n<p>MOYENS TECHNIQUES</p>\r\n<ul>\r\n<li>Salles de cours &eacute;quip&eacute;es de moyens multim&eacute;dia.</li>\r\n<li>Aires d&rsquo;&eacute;volution sp&eacute;cialement am&eacute;nag&eacute;es.</li>\r\n<li>V&eacute;hicules porteurs adapt&eacute;s &agrave; l&rsquo;enseignement.</li>\r\n<li>Fiche de suivi et livret d&rsquo;apprentissage.</li>\r\n<li>Fourniture de supports p&eacute;dagogiques sp&eacute;cifiques.</li>\r\n</ul>\r\n<p>EVALUATION ET CONDITION DE REUISSITE</p>\r\n<ul>\r\n<li>Feuilles de pr&eacute;sence &eacute;marg&eacute;es par les stagiaires.</li>\r\n<li>Un questionnaire est utilis&eacute; pour mesurer la satisfaction globale des stagiaires sur l&rsquo;organisation, les qualit&eacute;s p&eacute;dagogiques du formateur, les m&eacute;thodes et supports utilis&eacute;s &hellip;</li>\r\n</ul>\r\n<p>RESULTAT ATTENDU</p>\r\n<p>D&eacute;livrance de la carte de qualification de conducteur</p>', '<p>الأهداف من التكوين</p>\r\n<p>أن يكون قادراً على ممارسة مهنة سائق الشحن البري بما يتوافق مع أنظمة السلامة والمهنية من خلال تقديم خدمة عالية الجودة.</p>\r\n<ul>\r\n<li>أن تكون قادرًا على قيادة مركبة نقل البضائع وفقًا للمبادئ المهنية.</li>\r\n<li>أن يكون لديك أفكار عن القيادة العقلانية.</li>\r\n<li>معرفة كيفية استخدام جميع المستندات اللازمة لإجراء النقل.</li>\r\n<li>ضمان الأسس المهنية اللازمة لأداء عمل سائق الشحن البري مع مراعاة الشروط العامة لممارسة المهنة وشروط السلامة المحددة.</li>\r\n<li>معرفة التطبيقات الرقابية المنظمة للمهنة.</li>\r\n<li>معرفة القواعد والمبادئ المتعلقة بالصحة والسلامة الطرقية وسلامة البيئة.</li>\r\n<li>أن تكون على دراية بأهمية عالم النقل والمواقف الإيجابية التي يجب تطويرها تجاهه.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>تأطير</p>\r\n<p>تعيين مكونين مهنيين في إطار موافقة الهيئة البيداغوجية الخاصة بالأكاديمية والهيئة التكوينية</p>\r\n<p>&nbsp;</p>\r\n<p>طريق ووسائل التدريس</p>\r\n<ul>\r\n<li>الأساليب النشطة التي تتكيف مع تكوين الأشخص البالغين.</li>\r\n<li>تكوين نظري وتطبيقي.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>الوسائل التقنية</p>\r\n<ul>\r\n<li>الفصول الدراسية مجهزة بمصادر الوسائط المتعددة.</li>\r\n<li>مناطق تمارين مجهزة بشكل خاص.</li>\r\n<li>مركبات مناسبة للتدريس.</li>\r\n<li>ورقة متابعة وكتيب تعليمي.</li>\r\n<li>توفير وسائل تعليمية محددة.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>التقييم وشروط النجاح</p>\r\n<ul>\r\n<li>كشوف حضور موقعة من المتدربين.</li>\r\n<li>يتم استخدام استبيان لقياس الرضا العام للمتدربين عن الأكايديمية والمهارات التربوية للمدرب والطرق والمواد المستخدمة ...</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>النتائج المنتظرة</p>\r\n<p>اصدار بطاقة تأهيل السائق</p>\r\n<p>&nbsp;</p>'),
(17, 'Formation Continue Obligatoire (FCO)', '(FCO) التعليم المستمر الإجباري', '<p>La&nbsp;<strong>FCO</strong>&nbsp;est destin&eacute;e aux&nbsp;<strong>personnes &acirc;g&eacute;es au minimum de 21 ans</strong>&nbsp;et poss&eacute;dant un<strong>&nbsp;permis C/EC&nbsp;ou&nbsp;permis</strong>&nbsp;en cours de validit&eacute; (pour la FCO Marchandises) ou un&nbsp;<strong>permis D&nbsp;ou permis ED</strong>&nbsp;(pour la FCO voyageurs).</p>', '<p id=\"tw-target-text\" dir=\"rtl\" data-placeholder=\"Traduction\">&nbsp;<strong>التكوين (FCO) التعليم المستمر الإجباري</strong> مخصص <strong>للأشخاص الذين تبلغ أعمارهم 21 عامًا أو أكثر</strong> ولديهم <strong>رخصة سياقة من نوع C / EC أو رخصة سياقة سارية المفعول</strong> ل (FCO للسلع) أو <strong>رخصة سياقة من نوع D أو رخصة سياقة من نوع ED</strong> (للمسافرين FCO).</p>', '<p>La FCO est la Formation Continue Obligatoire, d&rsquo;une dur&eacute;e de 35 heures, renouvelable tous les 5 ans. Elle permet au conducteur d&rsquo;actualiser ses connaissances et parfaire sa pratique en mati&egrave;re de s&eacute;curit&eacute; et de r&eacute;glementation professionnelle. Elle est le recyclage de la FQIMO.</p>\r\n<p>&nbsp;</p>\r\n<p>OBJECTIFS DE LA FORMATION FCO MARCHANDISES :</p>\r\n<p>Acqu&eacute;rir ou compl&eacute;ter les connaissances et les comp&eacute;tences n&eacute;cessaires &agrave; l&rsquo;acc&egrave;s au secteur du transport de marchandises, par le perfectionnement &agrave; une conduite rationnelle ax&eacute; sur les r&egrave;gles de s&eacute;curit&eacute;, la connaissance, l&rsquo;application et le respect des r&eacute;glementations du transport et des r&egrave;gles relatives &agrave; la sant&eacute;, la s&eacute;curit&eacute; routi&egrave;re, l&rsquo;environnement &eacute;conomique et l&rsquo;organisation du march&eacute; du secteur du transport.</p>\r\n<p>A compter de la mise en place du contrat de progr&egrave;s dans le transport, tout conducteur(trice) de v&eacute;hicules de transport de marchandises, doit tous les 5 ans, suivre une FCO (Formation Continue Obligatoire) lui permettant de proc&eacute;der &agrave; une mise &agrave; jour de ses connaissances dans le domaine th&eacute;orique et pratique.</p>\r\n<p>&nbsp;</p>\r\n<p>METHODES PEDAGOGIQUES</p>\r\n<ul>\r\n<li>Cours th&eacute;oriques et pratiques. En cours collectifs.</li>\r\n<li>Cours pratique sur la route, sur v&eacute;hicule et/ou sur simulateur pour la conduite.</li>\r\n</ul>', '<p>FCO هي التعليم المستمر الإلزامي، ومدته 35 ساعة قابلة للتجديد كل 5 سنوات يسمح للسائق بتحديث معارفه وتحسين ممارسته من حيث السلامة الطلرقية واللوائح المهنية أنها عبارة عن إعادة تدوير ل FQIMO.</p>\r\n<p>&nbsp;</p>\r\n<p>أهداف تكوين FCO:&nbsp;</p>\r\n<p>اكتساب أو إكمال المعرفة والمهارات اللازمة لقطاع نقل البضائع ، من خلال تطوير القيادة العقلانية على أسس قواعد السلامة والمعرفة والتطبيق والامتثال لأنظمة وقواعد النقل المتعلقة بالصحة والسلامة الطرقية والبيئة الاقتصادية المنظمة لقطاع النقل.</p>\r\n<p>اعتبارا من تنفيذ عقد تقدم النقل، يجب على أي سائق مركبات نقل البضائع كل 5 سنوات اتباع تكوين التعليم المستمر الإلزامي (FCO)، مما يسمح له بالمضي قدما في تحديث معارفه في المجال النظري والتطبيقي.</p>\r\n<p>&nbsp;</p>\r\n<p>طرق التدريس</p>\r\n<ul>\r\n<li>دروس نظرية وتطبيقية. دروس جماعية.</li>\r\n<li>دورس تطبيقية على الطريق ، في المركبة و / أو على جهاز محاكاة القيادة.</li>\r\n</ul>'),
(19, 'Eco-conduite', 'السياقة البيئية', '<p>L&rsquo;&eacute;co conduite que l&rsquo;on peut aussi appeler conduite &eacute;conomique et conduite &eacute;cologique, a pour but de d&eacute;velopper le concept de conduite de mani&egrave;re &agrave; diminuer la pollution et d&rsquo;utiliser de mani&egrave;re efficace l&rsquo;&eacute;nergie.</p>', '<p><br>تهدف القيادة البيئية ، والتي يمكن تسميتها أيضًا بالقيادة الاقتصادية، إلى تطوير مفهوم القيادة بشكل يقلل التلوث ويستخدم الطاقة بكفاءة.</p>', '<p>Elle permet aux stagiaires d&rsquo;assimiler les enjeux du d&eacute;veloppement durable et de la s&eacute;curit&eacute; routi&egrave;re.&nbsp;<br>C&rsquo;est aussi pour permettre aux stagiaires de les sensibiliser sur l&rsquo;impact des comportements routiers et&nbsp;<br>sur la consommation de carburant.</p>\r\n<p>Les objectifs de l&rsquo;&eacute;co conduite</p>\r\n<p>La formation &eacute;co conduite que nous vous proposons va vous permettre d&rsquo;apprendre plusieurs choses :</p>\r\n<ul>\r\n<li>Les enjeux de la conduite &eacute;conomique et &eacute;cologique.</li>\r\n<li>Evaluer son comportement routier et sa consommation afin de l&rsquo;am&eacute;liorer si n&eacute;cessaire.</li>\r\n<li>Am&eacute;liorer ses connaissance afin de r&eacute;duire sa consommation mais aussi de ma&icirc;triser les co&ucirc;ts lors de l&rsquo;usage de son v&eacute;hicule.</li>\r\n</ul>', '<p>يتيح للمتدربين استيعاب تحديات التنمية المستدامة والسلامة الطرقية. كما أنها تتيح للمتدربين زيادة وعيهم بتأثير السلوك الطريقي واستهلاك الوقود على البيئة.</p>\r\n<p>أهداف القيادة البيئية</p>\r\n<p>سيسمح لك تدريب القيادة البيئية الذي نقدمه بتعلم العديد من الأشياء:</p>\r\n<ul>\r\n<li>&nbsp;تحديات القيادة الاقتصادية والبيئية.</li>\r\n<li>&nbsp;تقييم السلوك الطريقي واستهلاك الوقود من أجل تحسينه إذا لزم الأمر.</li>\r\n<li>&nbsp;تحسين معارفكم لتقليل استهلاكك للوقود ولكن أيضًا للتحكم في التكاليف عند استخدام عربتكم.</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `img_salle`
--

CREATE TABLE `img_salle` (
  `img_id` int(11) NOT NULL,
  `img_salle` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(200) NOT NULL,
  `img4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `iso`
--

CREATE TABLE `iso` (
  `iso_id` int(11) NOT NULL,
  `iso_nom` varchar(200) NOT NULL,
  `iso_presentation` text NOT NULL,
  `iso_res_nom` varchar(200) NOT NULL,
  `iso_res_email` varchar(200) NOT NULL,
  `iso_res_message` text NOT NULL,
  `iso_res_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `mat_id` int(11) NOT NULL,
  `mat_formation` int(11) NOT NULL,
  `mat_nom` varchar(200) NOT NULL,
  `mat_nom_arab` varchar(200) NOT NULL,
  `mat_duree` int(11) NOT NULL,
  `mat_prof` varchar(200) NOT NULL,
  `mat_prof_arab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`mat_id`, `mat_formation`, `mat_nom`, `mat_nom_arab`, `mat_duree`, `mat_prof`, `mat_prof_arab`) VALUES
(82, 16, 'Cours Théoqrique', 'درس نظري', 4, 'Sallim Bouhouch', 'سليم بوهوش'),
(83, 16, 'Cours Pratique', 'درس تطبيقي', 5, 'Mohamed Jamil', 'محمد جميل'),
(84, 17, 'Cours Théorique', 'درس نظري', 4, 'Jamal Bida', 'جمال بيدا'),
(85, 17, 'Cours Pratique', 'درس تطبيقي', 5, 'Salim Bouhouch', 'سليم بوهوش'),
(88, 19, 'Cours 1', 'وحدة 1', 4, 'salim', 'سليم');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `not_id` int(11) NOT NULL,
  `not_formation` int(11) NOT NULL,
  `not_matiere` int(11) NOT NULL,
  `not_etudiant` int(11) NOT NULL,
  `not_note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `pro_id` int(11) NOT NULL,
  `pro_formation` int(11) NOT NULL,
  `pro_groupe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_nom` varchar(200) NOT NULL,
  `res_telephone` varchar(200) NOT NULL,
  `res_email` varchar(200) NOT NULL,
  `res_salle` varchar(50) NOT NULL,
  `res_commentaire` varchar(200) NOT NULL,
  `res_date` date NOT NULL DEFAULT current_timestamp(),
  `time_debut` varchar(200) NOT NULL,
  `time_fin` varchar(200) NOT NULL,
  `res_cin` varchar(50) NOT NULL,
  `res_scan` varchar(100) NOT NULL,
  `res_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `sal_id` int(11) NOT NULL,
  `sal_nom` varchar(200) NOT NULL,
  `sal_nom_arab` text NOT NULL,
  `sal_desc` text NOT NULL,
  `sal_desc_arab` text NOT NULL,
  `sal_prix` float NOT NULL,
  `sal_personne` int(11) NOT NULL,
  `sal_image` varchar(200) NOT NULL,
  `sal_service` varchar(200) NOT NULL,
  `sal_service_arab` varchar(200) NOT NULL,
  `sal_service2` varchar(200) NOT NULL,
  `sal_service2_arab` varchar(200) NOT NULL,
  `sal_service3` varchar(200) NOT NULL,
  `sal_service3_arab` varchar(200) NOT NULL,
  `sal_service4` varchar(200) NOT NULL,
  `sal_service4_arab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`abs_id`),
  ADD KEY `absence` (`abs_formation`),
  ADD KEY `absence_etudiant` (`abs_etudiant`),
  ADD KEY `absence_matiere` (`abs_matiere`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`);

--
-- Index pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `attestation` (`att_etudiant`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `commetaires` (`com_article`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`dip_id`),
  ADD KEY `diplome` (`dip_etudiant`);

--
-- Index pour la table `douane`
--
ALTER TABLE `douane`
  ADD PRIMARY KEY (`dou_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`etud_id`),
  ADD KEY `etud_form` (`etud_formation`),
  ADD KEY `etud_promos` (`etud_promos`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`for_id`);

--
-- Index pour la table `img_salle`
--
ALTER TABLE `img_salle`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `images` (`img_salle`);

--
-- Index pour la table `iso`
--
ALTER TABLE `iso`
  ADD PRIMARY KEY (`iso_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `mat_forma` (`mat_formation`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `note_formation` (`not_formation`),
  ADD KEY `note_etudiant` (`not_etudiant`),
  ADD KEY `note_matiere` (`not_matiere`);

--
-- Index pour la table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `promo_formation` (`pro_formation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `salles` (`res_salle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`sal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `abs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5571;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `dip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `douane`
--
ALTER TABLE `douane`
  MODIFY `dou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `etud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `img_salle`
--
ALTER TABLE `img_salle`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `iso`
--
ALTER TABLE `iso`
  MODIFY `iso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence` FOREIGN KEY (`abs_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absence_etudiant` FOREIGN KEY (`abs_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absence_matiere` FOREIGN KEY (`abs_matiere`) REFERENCES `matiere` (`mat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `attestation` FOREIGN KEY (`att_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commetaires` FOREIGN KEY (`com_article`) REFERENCES `article` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD CONSTRAINT `diplome` FOREIGN KEY (`dip_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etud_form` FOREIGN KEY (`etud_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etud_promos` FOREIGN KEY (`etud_promos`) REFERENCES `promos` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `img_salle`
--
ALTER TABLE `img_salle`
  ADD CONSTRAINT `images` FOREIGN KEY (`img_salle`) REFERENCES `salle` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `mat_forma` FOREIGN KEY (`mat_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_etudiant` FOREIGN KEY (`not_etudiant`) REFERENCES `etudiant` (`etud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_formation` FOREIGN KEY (`not_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_matiere` FOREIGN KEY (`not_matiere`) REFERENCES `matiere` (`mat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promo_formation` FOREIGN KEY (`pro_formation`) REFERENCES `formation` (`for_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
