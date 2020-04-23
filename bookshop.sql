-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 27 2020 г., 12:17
-- Версия сервера: 5.7.28-0ubuntu0.18.04.4
-- Версия PHP: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Howard Lovecraft'),
(2, 'Stephen King'),
(3, 'Terry Pratchett'),
(4, 'Neil Gaiman'),
(5, 'Roger Zelazny'),
(6, 'Robert Sheckley'),
(7, 'George Orwell '),
(8, 'Theodore Dreiser'),
(9, 'Franz Kafka'),
(10, 'Erich Maria Remarque'),
(11, 'Ayn Rand'),
(12, 'Ray Bradbury'),
(13, 'Francis Scott Fitzgerald');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title_book` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `cost` double NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title_book`, `description`, `cost`, `image`) VALUES
(1, 'The Institute', 'Deep in the woods of Maine, there is a dark state facility where kids, abducted from across the United States, are incarcerated. In the Institute they are subjected to a series of tests and procedures meant to combine their exceptional gifts - telepathy, telekinesis - for concentrated effect.\n\nLuke Ellis is the latest recruit. He\'s just a regular 12-year-old, except he\'s not just smart, he\'s super-smart. And he has another gift which the Institute wants to use...\n\nFar away in a small town in South Carolina, former cop Tim Jamieson has taken a job working for the local sheriff. He\'s basically just walking the beat. But he\'s about to take on the biggest case of his career...\n\nLuke Ellis is the latest recruit. He\'s just a regular 12-year-old, except he\'s not just smart, he\'s super-smart. And he has another gift which the Institute wants to use...\n\nFar away in a small town in South Carolina, former cop Tim Jamieson has taken a job working for the local sheriff. He\'s basically just walking the beat. But he\'s about to take on the biggest case of his career...', 11, 'TheInstitute'),
(2, 'It', 'NOW A MAJOR MOTION PICTURE - Stephen King\'s terrifying classic.\n\n\'They float...and when you\'re down here with me, you\'ll float, too.\'\n\nDerry, Maine is just an ordinary town: familiar, well-ordered for the most part, a good place to live.\n\nIt is a group of children who see - and feel - what makes Derry so horribly different. In the storm drains, in the sewers, IT lurks, taking on the shape of every nightmare, each one\'s deepest dread. Sometimes is appears as an evil clown named Pennywise and sometimes IT reaches up, seizing, tearing, killing . . .\n\nTime passes and the children grow up, move away and forget. Until they are called back, once more to confront IT as IT stirs and coils in the sullen depths of their memories, emerging again to make their past nightmares a terrible present reality.', 22, 'It'),
(3, 'Pet Sematary', 'Soon to be a major motion picture from Paramount Pictures starring John Lithgow, Jason Clarke, and Amy Seimetz! King\'s iconic, beloved classic is \'so beautifully paced that you cannot help but be pulled in\' Guardian\n\n\'SOMETIMES...DEAD IS BETTER\'\n\nThe house looked right, felt right to Dr Louis Creed.\n\nRambling, old, unsmart and comfortable. A place where the family could settle; the children grow and play and explore. The rolling hills and meadows of Maine seemed a world away from the fume-choked dangers of Chicago.\n\nOnly the occasional big truck out on the two-lane highway, grinding up through the gears, hammering down the long gradients, growled out an intrusive threat.\n\nBut behind the house and far away from the road: that was safe. Just a carefully cleared path up into the woods where generations of local children have processed with the solemn innocence of the young, taking with them their dear departed pets for burial.\n\nA sad place maybe, but safe. Surely a safe place. Not a place to seep into your dreams, to wake you, sweating with fear and foreboding.\n\n\'King can make the flesh creep half a world away\' - The Times\n\'So beautifully paced that you cannot help but be pulled in\' - Guardian\n\'The most frightening novel Stephen King has ever written\' - Publisher\'s Weekly\n\'Wild, powerful, disturbing\' - Washington Post Book Review', 12.5, 'PetSematary'),
(4, 'Christine', '\'This is the story of a lover\'s triangle...It was bad from the start. And it got worse in a hurry\'. King\'s bestselling supernatural tale is about a boy, his girlfriend and a \'58 Plymouth Fury called Christine.\n\nChristine is eating into his mind, burrowing into his unconscious.\n\nChristine, blood-red, fat, and finned, is twenty. Her promise lies all in her past. Greedy and big, she is Arnie\'s obsession, a \'58 Plymouth Fury. Broken down but not finished.\n\nThere is still power in her - a frightening power that leaks like sump oil, staining and corrupting. A malign power that corrodes the mind and turns ownership into Possession.', 99, 'Christine'),
(5, 'Necronomicon', 'WIKIPEDIA says: \'H.P. Lovecraft\'s reputation has grown tremendously over the decades, and he is now commonly regarded as one of the most important horror writers of the 20th century, exerting an influence that is widespread, though often indirect.\'\n\nH.P. Lovecraft\'s tales of the tentacled Elder God Cthulhu and his pantheon of alien deities were initially written for the pulp magazines of the 1920s and \'30s. These astonishing tales blend elements of horror, science fiction and cosmic terror that are as powerful today as they were when they were first published.\n\nThis handsome leatherbound tome collects together the very best of Lovecraft\'s tales of terror, including the complete Cthulhu Mythos cycle, just the way they were originally published. It will introduce a whole new generation of readers to Lovecraft\'s fiction, as well as being a must-buy for those fans who want all his work in a single, definitive, highly attractive volume.', 21, 'Necronomicon'),
(6, 'Complete Cthulhu Mythos Tales', '1st Printing, with John Coulthart 2004 poster, \"Cthulhu Rising\", laid in. New, and completely pristine. See scans and description. New York: Barnes & Noble, Inc., 2016 (note: individual stories had early 20th century copyrights; poster, a 2004 copyright; cover art, a 2015 copyright; endpaper art, a 1988 copyright; compilation and introduction, a 2013 copyright by Fall River). H.P. Lovecraft - The Complete Cthulhu Mythos Tales. B&N Decorative Leatherbound Edition, First Edition Thus, First Printing. Tipped in poster is John Coulthart\'s famous 2004 poster, \"Cthulhu Rising\". Introduction by S.T. Joshi. A stunning form of presentation of the all-separately-published stories in the Cthulhu Mythos of the peerless H.P. Lovecraft - called \"The Man Who Can Scare Stephen King\", and of whom King said, \"I think it is beyond doubt that H. P. Lovecraft has yet to be surpassed as the twentieth century\'s greatest practitioner of the classic horror tale.\" Lovecraft\'s innate sense of horror - he instilled his native, inescapable sense of dread in his fiction - is best, and most famously, embodied in the Cthulhu Mythos chain of stories. Octavo, black background leather boards with illustrations and decorations in green and gilt on both covers and spine; spine ribbed; All Edges Gilt; endpapers illustrated (also by Coulthart); satin page-marker ribbon; xiii + 593 pp.+ 1 pp. About the Author. An extraordinarily handsome - and dread-inducing itself - decorative edition, the equal of any in Barnes and Noble\'s series of such editions. New, and flawless. Removed from publisher\'s shrink wrap only for scanning and description here; that disassembled shrinkwrap with gold sticker and book\'s own rear sticker will accompany the book. See all scans. First Edition Thus, and First Printing. Note: because the poster is neatly folded and tipped-in, the image of that here is borrowed. Ships in a new, sturdy, protective box, of course; not a bag. LT9\n', 14, 'CompleteCthulhuMythosTales'),
(7, 'Good Omens', 'People have been predicting the end of the world almost from its very beginning, so it’s only natural to be sceptical when a new date is set for Judgement Day. But what if, for once, the predictions are right, and the apocalypse really is due to arrive next Saturday, just after tea?\n\nYou could spend the time left drowning your sorrows, giving away all your possessions in preparation for the rapture, or laughing it off as (hopefully) just another hoax. Or you could just try to do something about it.\n\nIt’s a predicament that Aziraphale, a somewhat fussy angel, and Crowley, a fast-living demon now finds themselves in. They’ve been living amongst Earth’s mortals since The Beginning and, truth be told, have grown rather fond of the lifestyle and, in all honesty, are not actually looking forward to the coming Apocalypse.\n\nAnd then there’s the small matter that someone appears to have misplaced the Antichrist…', 33, 'GoodOmens'),
(8, 'A Farce to Be Reckoned With', 'On a devilish sabbatical in Europe, Azzie discovers that morality plays are all the rage. He decides to strike back by producing an \"immorality play\", in which seven nondescript human pilgrims will be allowed by magic to attain their hearts\' desires. But the forces of Good are determined to close the play before it opens. New characters suddenly start roaming the stage, such as a Grateful Dead-listening Cyclops, and Azzie\'s own protagonists begin changing their hearts\' desires on the slightest whim. This is one theatrical production that could do without an angel - and there\'s even worse news waiting in the wings...', 36, 'AFarcetoBeReckonedWith'),
(9, 'Animal Farm', '“All animals are equal, but some animals are more equal than others.”\n\nA farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned—a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.\n \nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.', 72.25, 'AnimalFarm'),
(10, 'The Financier', 'Frank Cowperwood, a fiercely ambitious businessman, emerges as the very embodiment of greed as he relentlessly seeks satisfaction in wealth, women, and power. As Cowperwood deals and double-deals, betrays and is in turn betrayed, his rise and fall come to represent the American success story stripped down to brutal realities-a struggle for spoils without conscience or pity. Dreiser\'s 1912 classic remains an unsparing social critique as well as a devastating character study of one of the most unforgettable American businessmen in twentieth-century literature.\n\nFor more than seventy years, Penguin has been the leading publisher of classic literature in the English-speaking world. With more than 1,700 titles, Penguin Classics represents a global bookshelf of the best works throughout history and across genres and disciplines. Readers trust the series to provide authoritative texts enhanced by introductions and notes by distinguished scholars and contemporary authors, as well as up-to-date translations by award-winning translators.', 99.99, 'TheFinancier'),
(11, 'The Metamorphosis', 'The Metamorphosis is a novella by Franz Kafka, first published in 1915. It has been cited as one of the seminal works of fiction of the 20th century and is studied in colleges and universities across the Western world. The story begins with a traveling salesman, Gregor Samsa, waking to find himself transformed (metamorphosed) into a large, monstrous insect-like creature. The cause of Samsa\'s transformation is never revealed, and Kafka himself never gave an explanation. The rest of Kafka\'s novella deals with Gregor\'s attempts to adjust to his new condition as he deals with being burdensome to his parents and sister, who are repulsed by the horrible, verminous creature Gregor has become.', 29.99, 'TheMetamorphosis'),
(12, 'Three Comrades', 'The year is 1928. On the outskirts of a large German city, three young men are earning a thin and precarious living. Fully armed young storm troopers swagger in the streets. Restlessness, poverty, and violence are everywhere. For these three, friendship is the only refuge from the chaos around them. Then the youngest of them falls in love, and brings into the group a young woman who will become a comrade as well, as they are all tested in ways they can have never imagined.', 11.45, 'ThreeComrades'),
(13, 'The Fountainhead', 'This modern classic is the story of intransigent young architect Howard Roark, whose integrity was as unyielding as granite...of Dominique Francon, the exquisitely beautiful woman who loved Roark passionately, but married his worst enemy...and of the fanatic denunciation unleashed by an enraged society against a great creator. As fresh today as it was then, Rand’s provocative novel presents one of the most challenging ideas in all of fiction—that man’s ego is the fountainhead of human progress...', 12, 'TheFountainhead'),
(14, 'Fahrenheit 451', 'Guy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.', 13, 'Fahrenheit451'),
(15, 'Dandelion Wine', 'The summer of \'28 was a vintage season for a growing boy. A summer of green apple trees, mowed lawns, and new sneakers. Of half-burnt firecrackers, of gathering dandelions, of Grandma\'s belly-busting dinner. It was a summer of sorrows and marvels and gold-fuzzed bees. A magical, timeless summer in the life of a twelve-year-old boy named Douglas Spaulding—remembered forever by the incomparable Ray Bradbury.', 15, 'DandelionWine'),
(16, 'The Great Gatsby', 'The Great Gatsby, F. Scott Fitzgerald’s third book, stands as the supreme achievement of his career. First published in 1925, this quintessential novel of the Jazz Age has been acclaimed by generations of readers. The story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted “gin was the national drink and sex the national obsession,” it is an exquisitely crafted tale of America in the 1920s.', 16, 'TheGreatGatsby');

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 1),
(6, 1),
(7, 3),
(7, 4),
(8, 5),
(8, 6),
(9, 7),
(10, 8),
(11, 9),
(12, 10),
(13, 11),
(14, 12),
(15, 12),
(16, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `book_genre`
--

CREATE TABLE `book_genre` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `book_genre`
--

INSERT INTO `book_genre` (`book_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 3),
(8, 1),
(8, 2),
(9, 4),
(10, 5),
(11, 1),
(11, 6),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(15, 1),
(16, 5),
(16, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(1, 'Fantasy'),
(2, 'Horror'),
(3, 'Comedy'),
(4, 'Satire'),
(5, 'Novel'),
(6, 'Narrative'),
(7, 'Tragedy');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
