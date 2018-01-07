-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: studentlist
-- ------------------------------------------------------
-- Server version	5.7.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id`          INT(11) UNSIGNED                 NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(200)                     NOT NULL,
  `surname`     VARCHAR(200)                     NOT NULL,
  `groupNumber` VARCHAR(5)                       NOT NULL,
  `examPoints`  INT(3)                           NOT NULL,
  `gender`      ENUM ('m', 'f')                  NOT NULL,
  `email`       VARCHAR(200)                     NOT NULL,
  `year`        YEAR(4)                          NOT NULL,
  `residence`   ENUM ('resident', 'nonresident') NOT NULL,
  `token`       VARCHAR(32)                      NOT NULL
  COMMENT 'cookie token for user authorisation',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `token` (`token`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 101
  DEFAULT CHARSET = utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students`
  DISABLE KEYS */;
INSERT INTO `students` VALUES (1, 'Нонна', 'Никифорова', 'БAВ20', 191, 'f', 'oponomarev@ya.ru', 1985, 'resident',
                               'c42dca41d3c99147b25dbdb1d0838286'),
  (2, 'Леонид', 'Тихонов', 'ВAБ6', 281, 'm', 'dobryny71@list.ru', 1973, 'nonresident', '27bb6c5830a096a666f75c3c87a57bf2'),
  (3, 'Лада', 'Копылова', 'БВA18', 163, 'f', 'zanna46@ya.ru', 2014, 'resident', '2171fa1972bdef26d896fbf46fc60430'),
  (4, 'Афанасий', 'Силин', 'БВA15', 153, 'm', 'fedoseev.ignat@mikeev.org', 1971, 'resident', '8db18572602626ea2b0d1f0e49eb6339'),
  (5, 'Олег', 'Некрасов', 'ВAБ16', 171, 'm', 'matvei.filippov@belousov.com', 2010, 'resident', '0eb405593bc07531bd59df866d0cab42'),
  (6, 'Артемий', 'Денисов', 'ВБA20', 293, 'm', 'fadeev.german@belykov.net', 2008, 'resident', 'a8eda825a0d91d463494d8a7fd2797b0'),
  (7, 'Полина', 'Гришина', 'ВБA4', 298, 'f', 'bmisin@ya.ru', 1975, 'resident', '17b1537607514c06baa1b8facb759e20'),
  (8, 'Нелли', 'Капустина', 'ВAБ1', 256, 'f', 'bogdan.gromov@bk.ru', 1990, 'resident', '39c365b3ea5add56e3988a439dd8b484'),
  (9, 'Зоя', 'Самойлова', 'БВA2', 177, 'f', 'cmikailov@krasilnikov.com', 2000, 'resident', 'b393f9587d728a692d41cbb05022fafe'),
  (10, 'Богдан', 'Уваров', 'ВAБ14', 230, 'm', 'klementina.mysnikov@narod.ru', 2006, 'nonresident', '85e07415003f955074f62fe9da9e0d58'),
  (11, 'Оксана', 'Моисеева', 'БВA18', 238, 'f', 'qpestov@inbox.ru', 2005, 'nonresident', 'b209f0f35d599d20069e824e9f9c96de'),
  (12, 'Майя', 'Русакова', 'AВБ19', 296, 'f', 'regina79@komarov.ru', 2002, 'resident', '5f3d5cede272da8c66ee169b6cd09351'),
  (13, 'Рената', 'Суворова', 'AВБ19', 181, 'f', 'dorofeev.liliy@subin.net', 2006, 'resident', 'aecb438aedd6225a9ef9125bafdd4591'),
  (14, 'Валериан', 'Лебедев', 'AВБ16', 173, 'm', 'spartak98@nikonov.ru', 1980, 'resident', '087673d9d271b003a743765805c7770c'),
  (15, 'Полина', 'Гусева', 'ВБA10', 206, 'f', 'afanasii.terentev@ya.ru', 2006, 'nonresident', '850ba80adf88ba09ab1a6ff09167d65f'),
  (16, 'Регина', 'Блинова', 'БAВ19', 172, 'f', 'valentin.avdeev@ya.ru', 1995, 'nonresident', 'f89b9bbb45052f00744788ef4bdd55b1'),
  (17, 'Клара', 'Лобанова', 'ВAБ7', 219, 'f', 'anna44@ya.ru', 1979, 'nonresident', '4fae08e1d6583065d77dc0dd7c1db441'),
  (18, 'Фаина', 'Гришина', 'БВA9', 197, 'f', 'korolev.rada@narod.ru', 1997, 'nonresident', '870d13f47692916dbaf84f8397b88c59'),
  (19, 'Нелли', 'Агафонова', 'БВA7', 269, 'f', 'isaev.zoy@inbox.ru', 2004, 'nonresident', '08fc3ff6057da2a8c37242a711a0373d'),
  (20, 'Родион', 'Лапин', 'ВAБ1', 285, 'm', 'malvina51@gmail.com', 1978, 'resident', 'a330f415feadccef39c15d5f5823ea43'),
  (21, 'Доминика', 'Данилова', 'БAВ14', 295, 'f', 'nikolaev.sofy@ya.ru', 2011, 'resident', '48f75df232b08f0468273ea28e3fa2ca'),
  (22, 'Нонна', 'Ершова', 'БВA1', 272, 'f', 'kovalev.yn@silin.net', 1985, 'nonresident', '6b55380f80ddd3afc534a068ed19be72'),
  (23, 'Стефан', 'Ковалёв', 'БВA7', 286, 'm', 'mtrofimov@gmail.com', 2003, 'resident', '0ac16f941468cefdcf187a024b2e07ee'),
  (24, 'Денис', 'Лукин', 'БВA18', 210, 'm', 'nonna48@ermakov.ru', 1979, 'resident', '16bb47d842cd4a0628757e89f1663ac1'),
  (25, 'Адам', 'Рябов', 'AВБ6', 165, 'm', 'kopylov.iskra@narod.ru', 2001, 'resident', '2e6c07e948a8ffb8fd51b23cc75a192e'),
  (26, 'Ирина', 'Селезнёва', 'ВБA10', 200, 'f', 'tamara12@afanasev.ru', 1977, 'nonresident', '03bd8bd262ef8590b225cc8e9d95aa74'),
  (27, 'Марта', 'Кононова', 'ВAБ14', 177, 'f', 'kbaranov@loginov.ru', 2005, 'resident', 'ed64ee678bf6fd3a13c55b32c5296e8c'),
  (28, 'Рада', 'Шарапова', 'AБВ7', 190, 'f', 'yfilatov@dmitriev.ru', 2014, 'resident', '6f25f05d8337caafe79176f171db7e01'),
  (29, 'Майя', 'Мартынова', 'AБВ16', 284, 'f', 'nikolai.petrov@gmail.com', 2012, 'nonresident', 'c7658aa3c66458bc3f93a578f9950cf1'),
  (30, 'Анфиса', 'Шестакова', 'ВБA4', 202, 'f', 'bkapustin@bobylev.ru', 2011, 'resident', '7ef3382b8b41dbc595ed2f275e1fbfa4'),
  (31, 'Искра', 'Морозова', 'ВБA6', 202, 'f', 'gavriil.ivanov@isaev.com', 1981, 'resident', '425c48d8859af14061209c424e02a845'),
  (32, 'Руслан', 'Сафонов', 'AБВ12', 274, 'm', 'ersov.rozalina@ignatev.ru', 2010, 'resident', '040edd13fa6e8f0c828f10c5cb0a0192'),
  (33, 'Дина', 'Захарова', 'AБВ13', 233, 'f', 'seliverstov.illarion@karpov.com', 1991, 'resident', '7288fed92a55bd5655b76bc6ac4a4da9'),
  (34, 'Эрик', 'Ермаков', 'БAВ2', 244, 'm', 'fedosy.kolobov@komissarov.ru', 1995, 'resident', '62e1577d6566dfa2a16eeba7d7202281'),
  (35, 'Илларион', 'Игнатьев', 'БВA1', 273, 'm', 'obirykov@kiselev.net', 1999, 'resident', '93106ce913a6791318748700db8b3bb6'),
  (36, 'Захар', 'Копылов', 'AВБ15', 154, 'm', 'alena27@mail.ru', 1972, 'nonresident', 'c4054004b2a15451121fe267b4e68b7a'),
  (37, 'Валентин', 'Власов', 'БAВ8', 193, 'm', 'nazarov.vikentii@galkin.ru', 1975, 'resident', 'e07083308beee28043c98efc9fdd677b'),
  (38, 'Инна', 'Шашкова', 'ВБA1', 281, 'f', 'albert00@rambler.ru', 1998, 'nonresident', 'fadd37284febeb98b783ab7d7f4ea898'),
  (39, 'Даниил', 'Беляев', 'ВБA4', 259, 'm', 'yroslava36@inbox.ru', 1977, 'resident', '9385aa7d7488cbc8d0c0c84e75d87f56'),
  (40, 'Юлия', 'Журавлёва', 'ВБA11', 213, 'f', 'gteterin@gmail.com', 1992, 'nonresident', '48d9e39719d52bed2732fd68397420aa'),
  (41, 'Кузьма', 'Зиновьев', 'AБВ2', 153, 'm', 'garri17@gmail.com', 2010, 'resident', 'ee196d6d8725a015458e7476aba8ea27'),
  (42, 'Виктория', 'Александрова', 'ВAБ4', 154, 'f', 'nikodim.kostin@bk.ru', 1971, 'nonresident', '5bdb7efc8bdd9bd9098ebb7080f726c2'),
  (43, 'Валериан', 'Агафонов', 'БAВ3', 197, 'm', 'rada.belousov@inbox.ru', 1970, 'resident', 'c01e3db83a6602705638030f00e9713a'),
  (44, 'Анна', 'Наумова', 'БAВ17', 170, 'f', 'egorov.boris@ya.ru', 1979, 'resident', '8fc48947878608c5633622ca8c4bd386'),
  (45, 'Борис', 'Соловьёв', 'БAВ11', 153, 'm', 'krylov.valentin@gmail.com', 1996, 'resident', '57ba653b1967c0401a6b894f4a9d75cb'),
  (46, 'Кирилл', 'Сысоев', 'БВA16', 196, 'm', 'vgurev@kondratev.com', 1978, 'resident', '1ef39912b33244c8c53bfe8fc559f077'),
  (47, 'Влад', 'Мельников', 'ВAБ20', 294, 'm', 'makarov.olga@popov.com', 1970, 'nonresident', 'beb99c9f9c2ffe085dfcc12a8ea2f63a'),
  (48, 'Клементина', 'Кузнецова', 'AВБ7', 244, 'f', 'nikolaev.fedor@hotmail.com', 1998, 'resident', '76a35fbef1e159ad2370a0fc16280a38'),
  (49, 'Ника', 'Авдеева', 'ВБA12', 238, 'f', 'ignatii18@subbotin.com', 1998, 'resident', '06898b3ec53e9d6760457c97f9080ce9'),
  (50, 'Юлий', 'Лаврентьев', 'БВA19', 264, 'm', 'krylov.florentina@rambler.ru', 1997, 'resident', '0856b504ea63d463b7121d83a45b2a3d'),
  (51, 'Сергей', 'Гурьев', 'ВБA2', 289, 'm', 'sava50@mail.ru', 1988, 'resident', '8a6f65c3ea61dd5fa5535e44adda8f3a'),
  (52, 'Лидия', 'Савельева', 'AБВ8', 230, 'f', 'marta.tikonov@hotmail.com', 1993, 'resident', 'b3121ce563a394d7076f51bbcd9d842a'),
  (53, 'Ефим', 'Александров', 'AВБ13', 219, 'm', 'ylii.artemev@rambler.ru', 1995, 'nonresident', '3fdb8a58c80c964cebc9e84c00014d96'),
  (54, 'Тарас', 'Туров', 'БВA1', 284, 'm', 'illarion42@grisin.org', 1991, 'resident', '9708fc2740d9975bb90afb7d56f57347'),
  (55, 'Ян', 'Голубев', 'ВAБ16', 295, 'm', 'fokin.nestor@bk.ru', 1976, 'nonresident', '153bce50ad3b174ef8da992163829509'),
  (56, 'Денис', 'Куликов', 'AВБ5', 274, 'm', 'alisa.mikailov@gmail.com', 2002, 'resident', 'aba00d490dd6e562b2d5ad776d33828b'),
  (57, 'Владлен', 'Лапин', 'БAВ6', 267, 'm', 'andreev.filipp@hotmail.com', 2014, 'nonresident', '572e28417f7ff88fe5cafdff354b3802'),
  (58, 'Вера', 'Евсеева', 'БВA18', 201, 'f', 'kovalev.konstantin@pestov.ru', 1987, 'nonresident', '82df07dcb1d8ab8988206241b533aec5'),
  (59, 'Раиса', 'Самсонова', 'AВБ10', 299, 'f', 'tbolsakov@bk.ru', 1994, 'resident', '9be82514131bbf010ba3db80ee949c84'),
  (60, 'Александр', 'Беляков', 'ВAБ15', 200, 'm', 'fedosy22@hotmail.com', 2004, 'resident', '379363b5bd4f1f4f940bc5cdf62a1392'),
  (61, 'Анастасия', 'Журавлёва', 'ВAБ17', 266, 'f', 'milan.matveev@nikitin.com', 1997, 'resident', '8134adb0ea6ba1990e7e1b065c224e25'),
  (62, 'Алиса', 'Кабанова', 'БВA19', 265, 'f', 'tit.mironov@rambler.ru', 1989, 'resident', 'e7f6f1bcb70ee9a4636117df0a555153'),
  (63, 'Юлий', 'Куликов', 'БВA15', 263, 'm', 'egor.safonov@hotmail.com', 1988, 'nonresident', '907dd39b4757e9ac501b2d3f48e7f559'),
  (64, 'Тамара', 'Пестова', 'AБВ20', 217, 'f', 'ogrisin@lavrentev.ru', 2006, 'nonresident', '1577d1be425e80a48cb3fcafa096033e'),
  (65, 'Игорь', 'Гордеев', 'БAВ19', 248, 'm', 'emiliy.romanov@mail.ru', 2009, 'nonresident', 'a3f56558c9e33fa343b6b3569cb5ffe0'),
  (66, 'Матвей', 'Жуков', 'ВБA11', 195, 'm', 'petr.grigorev@mamontov.ru', 1988, 'nonresident', '0239bd2b7db39b228ec945ae550d94f4'),
  (67, 'Алина', 'Смирнова', 'AВБ13', 180, 'f', 'fbykov@inbox.ru', 2003, 'nonresident', '05a7e102b19c96133076a7d8da85fc9f'),
  (68, 'Влад', 'Юдин', 'БВA16', 238, 'm', 'anna58@narod.ru', 1983, 'resident', '05266d425354649fd344f815986950bf'),
  (69, 'Ульяна', 'Комарова', 'БВA15', 186, 'f', 'florentina50@hotmail.com', 2016, 'resident', '53008de78599e793adcd8382946207aa'),
  (70, 'Изольда', 'Пахомова', 'БAВ17', 245, 'f', 'konovalov.milan@seleznev.ru', 2001, 'resident', '163cb50a264273912538a4e8cd96266c'),
  (71, 'Адам', 'Филиппов', 'БAВ12', 289, 'm', 'svorontov@ya.ru', 1971, 'nonresident', 'f2a0990d3b6a78b031f95b4253838b16'),
  (72, 'Ксения', 'Тетерина', 'ВБA3', 293, 'f', 'nosov.timur@sazonov.ru', 1984, 'resident', '1b7fb60b114913e70a09075d45052206'),
  (73, 'Раиса', 'Игнатьева', 'БВA7', 293, 'f', 'danila.krylov@yandex.ru', 1990, 'nonresident', '71843d89f014d9c4e286fb6bd3a7e2cd'),
  (74, 'Инга', 'Голубева', 'AВБ16', 235, 'f', 'gpotapov@mail.ru', 1998, 'resident', '3ceb1df1cb90704324ad74c1858e0c9b'),
  (75, 'Роберт', 'Никонов', 'ВБA5', 291, 'm', 'filatov.alena@list.ru', 2013, 'resident', 'dcc2ee3f122b4fd872d615dc4ba22da7'),
  (76, 'Ульяна', 'Кононова', 'БВA4', 158, 'f', 'ovcinnikov.danila@ykovlev.ru', 1993, 'resident', 'b0029ee9956db2acb1ce939c14eaa24c'),
  (77, 'Давид', 'Ильин', 'БAВ9', 248, 'm', 'lmaksimov@evseev.org', 1977, 'resident', '2a818811e01699f1089a82fb52583135'),
  (78, 'Ирина', 'Маслова', 'AБВ19', 182, 'f', 'taras.saskov@ya.ru', 2007, 'resident', 'a79018f9dcddcb16866e1d07584f423a'),
  (79, 'Ираклий', 'Кузнецов', 'ВAБ16', 257, 'm', 'cgorbunov@bk.ru', 1988, 'resident', '04b745aeb71cca51370a0c11a36be7e2'),
  (80, 'Варвара', 'Юдина', 'ВAБ5', 166, 'f', 'cevseev@list.ru', 1982, 'nonresident', 'b183d90c2b341812b62b2a1327a462a1'),
  (81, 'Дан', 'Коновалов', 'AБВ12', 252, 'm', 'kuzmin.petr@makarov.ru', 2011, 'resident', '5a691af3b1f1d1c6c0384cbc0b23f71d'),
  (82, 'Василиса', 'Сергеева', 'ВAБ14', 262, 'f', 'ibirykov@ya.ru', 1998, 'nonresident', 'e6207b25b6839cbf17adf004bb45fd2f'),
  (83, 'Алла', 'Овчинникова', 'AВБ18', 235, 'f', 'versov@belozerov.com', 1970, 'resident', '19b439f281944ee78bc118b3ba138b17'),
  (84, 'Всеволод', 'Калинин', 'AБВ12', 213, 'm', 'gburov@kabanov.com', 1998, 'nonresident', 'eca5f9aa63bc12d9040be254a8f94ada'),
  (85, 'Нонна', 'Тимофеева', 'БAВ13', 208, 'f', 'lidiy14@alekseev.net', 1987, 'nonresident', '80429f6d3470489d76dbef1439ad4ca6'),
  (86, 'Майя', 'Медведева', 'БAВ12', 295, 'f', 'milan.kabanov@list.ru', 2011, 'resident', 'd9b32304e410cb75cddc6452f271408a'),
  (87, 'Гавриил', 'Трофимов', 'ВБA1', 171, 'm', 'ykovlev.vadim@bobylev.ru', 1991, 'nonresident', '07f4f198d613ff6c8db10bc8fbed8478'),
  (88, 'Яков', 'Савельев', 'БВA3', 187, 'm', 'anfisa.zakarov@novikov.ru', 2004, 'resident', '33b3c5374a4a1181c4eabe7f589b66f5'),
  (89, 'Ника', 'Суворова', 'ВAБ19', 270, 'f', 'vyceslav17@fomicev.com', 2001, 'nonresident', '9e0e7db2b95672f04202d3df67026980'),
  (90, 'Надежда', 'Тетерина', 'БAВ14', 185, 'f', 'tdementev@rambler.ru', 2017, 'resident', 'dab19e840118d4b449bbb91bb2ba2425'),
  (91, 'Софья', 'Шашкова', 'ВБA19', 206, 'f', 'elizaveta76@fokin.com', 2008, 'resident', 'a295f2aa20c2f9c8b25c28136e6ef6fe'),
  (92, 'Ирина', 'Игнатова', 'AВБ1', 272, 'f', 'fsarov@blokin.org', 2002, 'nonresident',
   '1d9aafb10d2f8831334f412521ecd621'),
  (93, 'Давид', 'Белов', 'AВБ9', 237, 'm', 'kuzma54@hotmail.com', 1998, 'resident', 'ea9d13a2d93d65d0fa84e5f4d49e31a5'),
  (94, 'Артемий', 'Лыткин', 'БВA10', 264, 'm', 'rafail.savin@sarov.org', 2016, 'nonresident',
   '18ad7053531a604bb467cede20b8fa06'),
  (95, 'Эдуард', 'Щербаков', 'AБВ15', 200, 'm', 'timofei43@yandex.ru', 2006, 'nonresident',
   '80be6c35474b0043ac85015b4e0dbdd6'),
  (96, 'Антонина', 'Быкова', 'БAВ9', 202, 'f', 'kkalinin@hotmail.com', 2015, 'nonresident',
   '3aac01ab84c4f5c0f36d90df5ea71ee6'),
  (97, 'Гарри', 'Тарасов', 'БВA7', 290, 'm', 'iafanasev@markov.ru', 2003, 'nonresident',
   'd8abc0d691c7b6bc5b1eb60146bfb771'),
  (98, 'Ярослава', 'Белякова', 'БВA4', 274, 'f', 'rydin@mail.ru', 2014, 'nonresident',
   'b0b1c587996de62fcc8091dec7e0ff5d'),
  (99, 'Иммануил', 'Мишин', 'БAВ7', 200, 'm', 'gleb15@popov.ru', 1975, 'nonresident',
   'aff6ac736cd5fb27eafbaa625384c177'),
  (100, 'Игорь', 'Баранов', 'БВA2', 290, 'm', 'xsavelev@nikolaev.com', 1985, 'resident',
   'be0fb743c5ecfbec7723c2a87779bdb1');
/*!40000 ALTER TABLE `students`
  ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2018-01-07 21:32:23
