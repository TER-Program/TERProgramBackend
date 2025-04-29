-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 04:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ter`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspects`
--

CREATE TABLE `aspects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspects`
--

INSERT INTO `aspects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pedagógiai munka minősége, eredményessége', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(2, 'Feladatvállalás mennyiségi mutatói', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(3, 'Munkavégzés megbízhatósága, határidők betartása', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(4, 'Kommunikáció, együttműködés', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(5, 'Tehetséggondozás, felzárkóztatás/ esélyteremtés', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(6, 'Motiváció, elkötelezettség, etikus magatartás', '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(7, ' Egyedi intézményi értékelési szempont', '2025-04-29 12:54:57', '2025-04-29 12:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `aspect_items`
--

CREATE TABLE `aspect_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspect` bigint(20) UNSIGNED NOT NULL,
  `max_score` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `doc_required` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspect_items`
--

INSERT INTO `aspect_items` (`id`, `aspect`, `max_score`, `name`, `description`, `doc_required`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'A) A tanulói kompetenciamérési eredmények\n                    alakulása (ha a tanulók a\n                    kompetenciamérésben részt\n                    vesznek)*\n                    ', 'Az adott tanévi kompetencia mérési eredményeket az azt megelőző mérési eredményeihez képest kell vizsgálni, amelyek elérhetők\n                            az OH intézményi gyorsvisszajelző felületén. Ha az értékelt pedagógus több, mérési eredménnyel is rendelkező tanulócsoportban tanít,\n                            csoportonként kell a fejlődést értékelni és ezek együttese alapján kell\n                                a pontszámot meghatározni.', 1, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(2, 1, 8, 'B) A kizárólag sajátos neve 16 -\n                        lési igényű tanulókat nevelő-oktató iskolák esetében,\n                        ha a tanulók a kompetenciamérésben nem vesznek\n                        részt, az A) ponttól eltérően:\n                        Egyéni és csoportos fejlesztési eredmények\n                    ', 'B) Az egyéni és csoportszintű fejlesztés dokumentumai (fejlesztési\n                                tervek, tanulói munkák, egyéni fejlődés értékelése) alapján kell meghatározni', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(3, 1, 4, 'Intézményi statisztikák,\n                        tanulóra kereshető adatok\n                        változásainak iránya\n                    ', 'A pedagógus által tanított tanulók/csoportok félévi, év végi tantárgyi statisztikái, lemorzsolódással veszélyeztetett jelzőrendszeri\nmutatói alapján kell meghatározni, hogy ezek jók és/vagy javuló\ntendenciát mutatnak, vagy csökkenő, vagy stagnáló értéket, és a továbbtanulási mutatók kedvezően alakulnak-e.\nAz értékelésnél azt is figyelembe kell venni, hogy a tanulói eredményesség statisztikai mutatóira a pedagógustól független tényezők is\nhatással lehetnek (pl. egészségi és/vagy pszichés állapot változása). ', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(4, 1, 6, 'Korszerű, innovatív pedagógiai módszerek, eszközök, tanulásszervezési\neljárások tanórai alkalmazása, a vonatkozó irányelvek\nalkalmazása.\n                    ', 'A pedagógus a tanóráin rendszeresen alkalmazza a digitális eszközöket és a digitális tananyagtartalmakat.\nÉlményalapú, interaktív munkaszervezési és értékelési módszereket\nalkalmaz (pl. csoportmunka, projektfeladat, folyamatba ágyazott értékelés), fejleszti a mérlegelő gondolkodási készségeket, erősíti a tantárgyak, műveltségi területek közötti tantárgyközi kapcsolódásokat.\nEgyénre szabottan és céltudatosan fejleszti a tanulók készségeit,\na sajátos nevelési igényű, illetve beilleszkedési, tanulási, magatartási\nnehézséggel küzdő tanulók számára differenciált ellátást biztosít.', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(5, 1, 2, 'Díjak, elismerések, kutatási\neredmények, publikációk,\nmesterprogram, kutató tanári program megvalósítása\nés ezek hasznosulása az iskola életében.\n                    ', 'Rendelkezik a pedagógiai munkája eredményességét bizonyító,\naz intézmény által alapított és/ vagy helyi, települési, tankerületi\nvagy egyéb állami díjakkal, elismerésekkel. Mesterpedagógus és kutató tanári programjával, kutatási eredményeivel, publikációkkal\nhozzájárul az intézményi, vagy tágabb értelemben (helyi, regionális,\nországos szinten) a pedagógiai munka minőségének fejlesztéséhez.', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(6, 2, 3, 'Éves tartalmi tervezés, napi\ntervezés.\n                    ', 'Az adott tanulócsoport jellemzőinek ismerete alapján a tanulócsoport és az egyes tanulók eltérő képességeire, szociokulturális\nhelyzetére figyelemmel készít tanmenetet, foglalkozási tervet. Óráira\nfelkészül, témavázlatot és/vagy óratervet készít, és ezek ütemezése\nalapján halad a tanítással, óravezetése, napi szakmai tevékenysége\ntervszerűen felépített. (Több tantárgy tanítása esetén több pont.)', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(7, 2, 3, 'Többletfeladatok, különböző megbízások vállalása.\n                    ', 'Osztályfőnök, munkaközösség-vezető, DÖK munkáját segítő\npedagógus, ÖTM tagja, eseti vagy állandó munkacsoport tagja,\npályázatfigyelő, pályázatíró, mentorálja a végzős hallgatókat/gyakornokot, mesterpedagógusként, kutatótanárként intézményfejlesztési\nfeladatokat vállal, támogatja az intézmény, a pedagógusok munkáját.\n(Több megbízatás esetén több pont.)', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(8, 2, 3, 'Az intézményen belüli szabadidős programok szervezése\n                    ', 'Iskolai szabadidős programokat szervez és/vagy megvalósításában\naktívan részt vesz tanulói közösségével, azokat dokumentálja (forgatókönyv, beszámoló, elégedettségmérés/értékelés stb.). Az intézményi hagyományok ápolásában tevékenyen vesz részt.', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(9, 2, 3, 'Az intézményen kívüli\nprogramokban való részvétel (projektek, táborok,\ntanulmányi utak, múzeumés színházlátogatás stb.)\n                    ', 'Iskolán kívüli programokat kezdeményez, szervez, tájékoztatja\na tanulókat az iskolán kívüli programokról. Önálló feladatot vállal\na programok megvalósítása során, vagy a programok megvalósításában aktívan részt vesz.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(10, 3, 2, 'A pedagógus szabályés normakövető magatartása\n                    ', 'A pedagógus foglalkoztatással kapcsolatos irányadó ágazati jogszabályokban rá vonatkozó rendelkezéseket ismeri és követi, az SZMSZ\nés Házirend szabályait, a munkaköri leírásában foglaltakat maradéktalanul betartja.\nA tanügyi dokumentumokkal, vizsgákkal összefüggő adminisztrációs feladatokat – a feladatköréhez kapcsolódóan – szakszerűen,\npontosan, határidőre elvégzi.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(11, 3, 3, 'Haladási napló vezetése\n                    ', 'Az e-naplóban tantárgyához, foglalkozásaihoz kapcsolódóan naprakészen vezeti az előrehaladást, illetve a tanulók késését, hiányzását..\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(12, 3, 3, 'A tanulók értékelésével öszszefüggő adminisztrációs\ntevékenység\n                    ', 'Szóbeli, írásbeli és egyéb a tanuló által készített produktumokat folyamatosan, az intézményi belső szabályzókban meghatározott időtartamon belül értékeli, a tanulóknak megfelelő számú érdemjegyet,\nértékelést ad/ szöveges értékelését az előírt módon vezeti.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(13, 4, 3, 'Nevelőtestületi, szakmai\nmunkaközösségi tevékenységekben való részvétel,\negyüttműködés szakmai\npartnerekkel\n                    ', 'Konstruktív, építő jelleggel részt vesz a nevelőtestületi értekezleteken, hozzászólásokkal, pedagógiai jellegű előadások tartásával (pl.\nnevelési értekezleten) segíti a testület munkáját. Aktívan közreműködik a szakmai munkaközössége éves programjainak tervezésében,\nszervezésében, megvalósításában, értékelésében. Törekszik arra,\nhogy naprakész információval rendelkezzen, az információk átadásában és fogadásában mindig szakszerű és objektív.\nMunkavégzése során kezdeményezően együttműködik a pedagógustársaival, szakmai partnerekkel (pl. iskolapszichológus, pedagógiai szakszolgálat munkatársai, szociális segítő, iskolaorvos, családsegítő stb.)\nNyitottság, szakmai kihívások megoldásában való aktivitás jellemzi.\n\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(14, 4, 3, 'Kapcsolattartás és kommunikáció a szülőkkel/törvényes képviselőkkel\n                    ', 'A szülői értekezleteket, fogadó órákat hiánytalanul megtartja. A szülőket/törvényes képviselőket igény szerint szakszerűen, közérthetően és objektíven tájékoztatja, velük a folyamatos együttműködésre\nvaló törekvés jellemzi.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(15, 6, 2, 'Motiváció, elkötelezettség\n                    ', 'Szakmai tudását folyamatos megújítja, módszertani kultúráját fejleszti, beépíti a mindennapi pedagógiai gyakorlatba. Fontos számára\naz erősségeinek és fejleszthető területeinek önértékeléssel történő\nrendszeres meghatározása. Elkötelezett az intézmény küldetése, céljai és a pedagógiai program iránt, a megvalósításban kezdeményező\nszerepet vállal.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(16, 6, 2, 'A szervezet képviselete\n                    ', 'Külső és belső fórumokon, programokon eredményesen képviseli\nés menedzseli az intézmény érdekeit, öregbíti az intézmény jó hírnevét.\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57'),
(17, 6, 2, 'Etikus magatartás\n                    ', 'A rá vonatkozó pedagógus etikai szabályok szerinti normákat követi, betartja\n', 0, '2025-04-29 12:54:57', '2025-04-29 12:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `performanceGoal` bigint(20) UNSIGNED NOT NULL,
  `evaluator` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `performanceGoal` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_01_14_122009_create_aspects_table', 1),
(3, '2025_01_14_122406_create_aspect_items_table', 1),
(4, '2025_01_14_122640_create_performance_goals_table', 1),
(5, '2025_01_14_122831_create_comments_table', 1),
(6, '2025_01_14_123604_create_personal_access_tokens_table', 1),
(7, '2025_01_28_085614_add_score_constraint_to_performance_goals', 1),
(8, '2025_02_18_075507_create_documents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_goals`
--

CREATE TABLE `performance_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher` bigint(20) UNSIGNED NOT NULL,
  `evaluator` bigint(20) UNSIGNED DEFAULT NULL,
  `aspect_item` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `scored` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `performance_goals`
--
DELIMITER $$
CREATE TRIGGER `check_score_valid_insert` BEFORE INSERT ON `performance_goals` FOR EACH ROW BEGIN
                DECLARE maxScore INT DEFAULT 0;

                SELECT COALESCE(max_score, 0) INTO maxScore
                FROM aspect_items
                WHERE id = NEW.aspect_item
                LIMIT 1;

                IF NEW.score < 0 OR NEW.score > maxScore THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Invalid score: must be between 0 and max_score of the related aspect_item.";
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_score_valid_update` BEFORE UPDATE ON `performance_goals` FOR EACH ROW BEGIN
                DECLARE maxScore INT DEFAULT 0;

                -- max_score lekérdezése
                SELECT COALESCE(max_score, 0) INTO maxScore
                FROM aspect_items
                WHERE id = NEW.aspect_item
                LIMIT 1;

                -- Validáció
                IF NEW.score < 0 OR NEW.score > maxScore THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Invalid score: must be between 0 and max_score of the related aspect_item.";
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `started` date DEFAULT NULL,
  `ended` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `email_verified_at`, `started`, `ended`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'A Tanár', 'tanar@tanar.com', '$2y$12$l.rKpUcoWNc4EpsLPWYj4.dsczVOLWaQaB48YvAXaUrR/.2e2ABXy', 2, NULL, '2025-01-01', NULL, NULL, '2025-04-29 12:54:56', '2025-04-29 12:54:56'),
(2, 'Tér Felelős', 'ter@ter.com', '$2y$12$cJvdsdyEVkQg8nHUfZEN0u11AGeHRCDz3Bzq4rVRKaZ.6pAPbTnki', 1, NULL, '2025-01-01', NULL, NULL, '2025-04-29 12:54:56', '2025-04-29 12:54:56'),
(3, 'Admin', 'admin@admin.com', '$2y$12$2wr3jV6G/nE/XFOc/0pxd.CnMQqjMniYLilsC7BMOiklpK/lt0hLO', 0, NULL, '2025-01-01', NULL, NULL, '2025-04-29 12:54:57', '2025-04-29 12:54:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspects`
--
ALTER TABLE `aspects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspect_items`
--
ALTER TABLE `aspect_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspect_items_aspect_foreign` (`aspect`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_performancegoal_foreign` (`performanceGoal`),
  ADD KEY `comments_evaluator_foreign` (`evaluator`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_performancegoal_foreign` (`performanceGoal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `performance_goals`
--
ALTER TABLE `performance_goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_goals_teacher_foreign` (`teacher`),
  ADD KEY `performance_goals_aspect_item_foreign` (`aspect_item`),
  ADD KEY `performance_goals_evaluator_foreign` (`evaluator`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspects`
--
ALTER TABLE `aspects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aspect_items`
--
ALTER TABLE `aspect_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `performance_goals`
--
ALTER TABLE `performance_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspect_items`
--
ALTER TABLE `aspect_items`
  ADD CONSTRAINT `aspect_items_aspect_foreign` FOREIGN KEY (`aspect`) REFERENCES `aspects` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_evaluator_foreign` FOREIGN KEY (`evaluator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_performancegoal_foreign` FOREIGN KEY (`performanceGoal`) REFERENCES `performance_goals` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_performancegoal_foreign` FOREIGN KEY (`performanceGoal`) REFERENCES `performance_goals` (`id`);

--
-- Constraints for table `performance_goals`
--
ALTER TABLE `performance_goals`
  ADD CONSTRAINT `performance_goals_aspect_item_foreign` FOREIGN KEY (`aspect_item`) REFERENCES `aspect_items` (`id`),
  ADD CONSTRAINT `performance_goals_evaluator_foreign` FOREIGN KEY (`evaluator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `performance_goals_teacher_foreign` FOREIGN KEY (`teacher`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
