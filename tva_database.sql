-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 19 2021 г., 14:11
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tva`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL,
  `file_tip` varchar(50) NOT NULL,
  `matn` text NOT NULL,
  `rev_job_id` varchar(55) NOT NULL,
  `summary` text NOT NULL,
  `summary_2` text NOT NULL,
  `keywords` text NOT NULL,
  `highlight` text NOT NULL,
  `vaqt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `name`, `author`, `file`, `language`, `file_tip`, `matn`, `rev_job_id`, `summary`, `summary_2`, `keywords`, `highlight`, `vaqt`, `user_id`) VALUES
(23, 'Qabul boshlanmoda', 'Esanov Otabek', 'video_1632042002.mp4', 'eng', 'video', 'Speaker 0    00:00:00    Hello, and welcome to the course on top 50 skill interview questions, a compilation of SQL interview questions from top-notch companies. Let\'s try to solve today\'s question. So in this, the first question would be the basic question asked in almost all small pack of small companies to MNCs. The question is that of how to find the second highest salary of an employee. So generally you will be given a table, uh, between was a salary column of numbers. So you are asked, you are asked to find the second highest number in that let\'s try to solve this problem. So we are having a table called EMP. So in this, we are considering a column called salary, so, and we need to display the second highest salary in the column. So we are having thousand two thousand three thousand four thousand five hundred for 5002nd. Hire the faster higher salary will be 5,000. Okay, fine.  \nSpeaker 0    00:00:48    The second highest salary will be 2000. The approach that we will fall, that we are going to follow is that first we need to create a result set. First, we are going to create a dataset that is free from the first highest salary. That means we need to create this data set that is free from firehouse. Again, apply the maximum function, offered excluding the highest salary. That means after excluding fight origin, if your plan maximum maximum function on the remaining dataset, the highest salary would be for Tuftin, which is the second highest salary. In two ways, we can find solution for that. So the first approach is using the sub query approach, select mags of salary from E M P where salary, not in the list, not in select max off Sal from E M B always remember first subqueries will be executed, followed by outermost grade.  \nSpeaker 0    00:01:38    So select mags off salary from EMP were written 5,000. Okay. After that outermost very will be executed. CLF max off salary from EMP where salary not in spite of them. That means it will return the maximum salary except the 5,000. That means after eliminating 5,000, the salary higher salary among the present data is 4,000. So this is how you need to find. So exclude the dataset, exclude the highest, faster high, yes, two salary again. After, uh, after applying the maximum maximum function on the salary column, then you will adjust the second highest salary. Okay. This is how it works. Let\'s compel the core. Don\'t put this 4,000, okay. That is the second highest salary of the salary column and the employee table. So you can do in another avails, whenever you are not aware of this, not in operator. So you can make use of greater, uh, lesbian operator.  \nSpeaker 0    00:02:37    That means you are displaying the salary from EMP table, which is less than the maximum salary. That means first it will return 5,000. So select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary. That means salary less than 5,000. It means it will a dataset that is free from fight. That means whatever the values that are lesser than 5,000 will be considered. So all the values lesser than 5,000 will be put at one place. And again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you. The second highest salary, one way used to make use of naughty operator and the other we use to make sure have this less than operator. So if you compare the core output is 4,000, the second highest salary. This is how you need to find the second highest salary. The two approaches hope you have in your discretion. If you have any queries and any other interesting skill into a questions, please do share with us. Let\'s solve them together and help other success. Thank you for watching. \n', 'wQpjtEFapwq3', 'c', 'After, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nOkay.\nThis is how it works.', 'salary\nsecond-highest\nmaximum\nhigher\n5,000\ncolumn\nhighest\nmags\ntable\nfunction', 'So generally you will be given a table, uh, between was a salary column of numbers.\nSo in this, we are considering a column called salary, so, and we need to display the second-highest salary in the column.\nAgain, apply the maximum function, offered excluding the highest salary.\nThat means after excluding fight origin, if your plan maximum function on the remaining dataset, the highest salary would be for Tufting, which is the second-highest salary.\nThat means it will return the maximum salary except the 5,000.\nThat means after eliminating 5,000, the salary higher salary among the present data is 4,000.\nAfter, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nThat is the second-highest salary of the salary column and the employee table.\nSo select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary.\nAnd again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you.', '2021-09-19 14:00:05', 2),
(24, 'Qabul boshlanmoda', 'Esanov Otabek', 'video_1632042031.mp4', 'eng', 'video', 'Speaker 0    00:00:00    Hello, and welcome to the course on top 50 skill interview questions, a compilation of SQL interview questions from top-notch companies. Let\'s try to solve today\'s question. So in this, the first question would be the basic question asked in almost all small pack of small companies to MNCs. The question is that of how to find the second highest salary of an employee. So generally you will be given a table, uh, between was a salary column of numbers. So you are asked, you are asked to find the second highest number in that let\'s try to solve this problem. So we are having a table called EMP. So in this, we are considering a column called salary, so, and we need to display the second highest salary in the column. So we are having thousand two thousand three thousand four thousand five hundred for 5002nd. Hire the faster higher salary will be 5,000. Okay, fine.  \nSpeaker 0    00:00:48    The second highest salary will be 2000. The approach that we will fall, that we are going to follow is that first we need to create a result set. First, we are going to create a dataset that is free from the first highest salary. That means we need to create this data set that is free from firehouse. Again, apply the maximum function, offered excluding the highest salary. That means after excluding fight origin, if your plan maximum maximum function on the remaining dataset, the highest salary would be for Tuftin, which is the second highest salary. In two ways, we can find solution for that. So the first approach is using the sub query approach, select mags of salary from E M P where salary, not in the list, not in select max off Sal from E M B always remember first subqueries will be executed, followed by outermost grade.  \nSpeaker 0    00:01:38    So select mags off salary from EMP were written 5,000. Okay. After that outermost very will be executed. CLF max off salary from EMP where salary not in spite of them. That means it will return the maximum salary except the 5,000. That means after eliminating 5,000, the salary higher salary among the present data is 4,000. So this is how you need to find. So exclude the dataset, exclude the highest, faster high, yes, two salary again. After, uh, after applying the maximum maximum function on the salary column, then you will adjust the second highest salary. Okay. This is how it works. Let\'s compel the core. Don\'t put this 4,000, okay. That is the second highest salary of the salary column and the employee table. So you can do in another avails, whenever you are not aware of this, not in operator. So you can make use of greater, uh, lesbian operator.  \nSpeaker 0    00:02:37    That means you are displaying the salary from EMP table, which is less than the maximum salary. That means first it will return 5,000. So select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary. That means salary less than 5,000. It means it will a dataset that is free from fight. That means whatever the values that are lesser than 5,000 will be considered. So all the values lesser than 5,000 will be put at one place. And again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you. The second highest salary, one way used to make use of naughty operator and the other we use to make sure have this less than operator. So if you compare the core output is 4,000, the second highest salary. This is how you need to find the second highest salary. The two approaches hope you have in your discretion. If you have any queries and any other interesting skill into a questions, please do share with us. Let\'s solve them together and help other success. Thank you for watching. \n', '5118BZiQJvIg', 'c', 'After, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nOkay.\nThis is how it works.', 'salary\nsecond-highest\nmaximum\nhigher\n5,000\ncolumn\nhighest\nmags\ntable\nfunction', 'So generally you will be given a table, uh, between was a salary column of numbers.\nSo in this, we are considering a column called salary, so, and we need to display the second-highest salary in the column.\nAgain, apply the maximum function, offered excluding the highest salary.\nThat means after excluding fight origin, if your plan maximum function on the remaining dataset, the highest salary would be for Tufting, which is the second-highest salary.\nThat means it will return the maximum salary except the 5,000.\nThat means after eliminating 5,000, the salary higher salary among the present data is 4,000.\nAfter, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nThat is the second-highest salary of the salary column and the employee table.\nSo select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary.\nAnd again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you.', '2021-09-19 14:00:33', 2),
(25, 'Otabek', 'Esanov Otabek', 'audio_1632045585.wav', 'eng', 'audio', 'Speaker 0    00:00:00    Hello, and welcome to the course on top 50 skill interview questions, a compilation of SQL interview questions from top-notch companies. Let\'s try to solve today\'s question. So in this, the first question would be the basic question asked in almost all small pack of small companies to MNCs. The question is that of how to find the second highest salary of an employee. So generally you will be given a table, uh, between was a salary column of numbers. So you are asked, you are asked to find the second highest number in that let\'s try to solve this problem. So we are having a table called EMP. So in this, we are considering a column called salary, so, and we need to display the second highest salary in the column. So we are having thousand two thousand three thousand four thousand five hundred for 5002nd. Hire the faster higher salary will be 5,000. Okay, fine.  \nSpeaker 0    00:00:48    The second highest salary will be 2000. The approach that we will fall, that we are going to follow is that first we need to create a result set. First, we are going to create a dataset that is free from the first highest salary. That means we need to create this data set that is free from firehouse. Again, apply the maximum function, offered excluding the highest salary. That means after excluding fight origin, if your plan maximum maximum function on the remaining dataset, the highest salary would be for Tuftin, which is the second highest salary. In two ways, we can find solution for that. So the first approach is using the sub query approach, select mags of salary from E M P where salary, not in the list, not in select max off Sal from E M B always remember first subqueries will be executed, followed by outermost grade.  \nSpeaker 0    00:01:38    So select mags off salary from EMP were written 5,000. Okay. After that outermost very will be executed. CLF max off salary from EMP where salary not in spite of them. That means it will return the maximum salary except the 5,000. That means after eliminating 5,000, the salary higher salary among the present data is 4,000. So this is how you need to find. So exclude the dataset, exclude the highest, faster high, yes, two salary again. After, uh, after applying the maximum maximum function on the salary column, then you will adjust the second highest salary. Okay. This is how it works. Let\'s compel the core. Don\'t put this 4,000, okay. That is the second highest salary of the salary column and the employee table. So you can do in another avails, whenever you are not aware of this, not in operator. So you can make use of greater, uh, lesbian operator.  \nSpeaker 0    00:02:37    That means you are displaying the salary from EMP table, which is less than the maximum salary. That means first it will return 5,000. So select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary. That means salary less than 5,000. It means it will a dataset that is free from fight. That means whatever the values that are lesser than 5,000 will be considered. So all the values lesser than 5,000 will be put at one place. And again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you. The second highest salary, one way used to make use of naughty operator and the other we use to make sure have this less than operator. So if you compare the core output is 4,000, the second highest salary. This is how you need to find the second highest salary. The two approaches hope you have in your discretion. If you have any queries and any other interesting skill into a questions, please do share with us. Let\'s solve them together and help other success. Thank you for watching. \n', 'RIRa5ScEGQK7', 'c', 'After, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nOkay.\nThis is how it works.', 'salary\nsecond-highest\nmaximum\nhigher\n5,000\ncolumn\nhighest\nmags\ntable\nfunction', 'So generally you will be given a table, uh, between was a salary column of numbers.\nSo in this, we are considering a column called salary, so, and we need to display the second-highest salary in the column.\nAgain, apply the maximum function, offered excluding the highest salary.\nThat means after excluding fight origin, if your plan maximum function on the remaining dataset, the highest salary would be for Tufting, which is the second-highest salary.\nThat means it will return the maximum salary except the 5,000.\nThat means after eliminating 5,000, the salary higher salary among the present data is 4,000.\nAfter, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nThat is the second-highest salary of the salary column and the employee table.\nSo select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary.\nAnd again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you.', '2021-09-19 14:59:47', 2),
(26, 'Qabul boshlanmoda', 'Esanov Otabek', 'audio_1632046319.mp4', 'eng', 'audio', 'Speaker 0    00:00:00    Hello, and welcome to the course on top 50 skill interview questions, a compilation of SQL interview questions from top-notch companies. Let\'s try to solve today\'s question. So in this, the first question would be the basic question asked in almost all small pack of small companies to MNCs. The question is that of how to find the second highest salary of an employee. So generally you will be given a table, uh, between was a salary column of numbers. So you are asked, you are asked to find the second highest number in that let\'s try to solve this problem. So we are having a table called EMP. So in this, we are considering a column called salary, so, and we need to display the second highest salary in the column. So we are having thousand two thousand three thousand four thousand five hundred for 5002nd. Hire the faster higher salary will be 5,000. Okay, fine.  \nSpeaker 0    00:00:48    The second highest salary will be 2000. The approach that we will fall, that we are going to follow is that first we need to create a result set. First, we are going to create a dataset that is free from the first highest salary. That means we need to create this data set that is free from firehouse. Again, apply the maximum function, offered excluding the highest salary. That means after excluding fight origin, if your plan maximum maximum function on the remaining dataset, the highest salary would be for Tuftin, which is the second highest salary. In two ways, we can find solution for that. So the first approach is using the sub query approach, select mags of salary from E M P where salary, not in the list, not in select max off Sal from E M B always remember first subqueries will be executed, followed by outermost grade.  \nSpeaker 0    00:01:38    So select mags off salary from EMP were written 5,000. Okay. After that outermost very will be executed. CLF max off salary from EMP where salary not in spite of them. That means it will return the maximum salary except the 5,000. That means after eliminating 5,000, the salary higher salary among the present data is 4,000. So this is how you need to find. So exclude the dataset, exclude the highest, faster high, yes, two salary again. After, uh, after applying the maximum maximum function on the salary column, then you will adjust the second highest salary. Okay. This is how it works. Let\'s compel the core. Don\'t put this 4,000, okay. That is the second highest salary of the salary column and the employee table. So you can do in another avails, whenever you are not aware of this, not in operator. So you can make use of greater, uh, lesbian operator.  \nSpeaker 0    00:02:37    That means you are displaying the salary from EMP table, which is less than the maximum salary. That means first it will return 5,000. So select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary. That means salary less than 5,000. It means it will a dataset that is free from fight. That means whatever the values that are lesser than 5,000 will be considered. So all the values lesser than 5,000 will be put at one place. And again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you. The second highest salary, one way used to make use of naughty operator and the other we use to make sure have this less than operator. So if you compare the core output is 4,000, the second highest salary. This is how you need to find the second highest salary. The two approaches hope you have in your discretion. If you have any queries and any other interesting skill into a questions, please do share with us. Let\'s solve them together and help other success. Thank you for watching. \n', 'NEXwdCno06sl', 'c', 'After, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nOkay.\nThis is how it works.', 'salary\nsecond-highest\nmaximum\nhigher\n5,000\ncolumn\nhighest\nmags\ntable\nfunction', 'So generally you will be given a table, uh, between was a salary column of numbers.\nSo in this, we are considering a column called salary, so, and we need to display the second-highest salary in the column.\nAgain, apply the maximum function, offered excluding the highest salary.\nThat means after excluding fight origin, if your plan maximum function on the remaining dataset, the highest salary would be for Tufting, which is the second-highest salary.\nThat means it will return the maximum salary except the 5,000.\nThat means after eliminating 5,000, the salary higher salary among the present data is 4,000.\nAfter, uh, after applying the maximum function on the salary column, then you will adjust the second-highest salary.\nThat is the second-highest salary of the salary column and the employee table.\nSo select mags off salary from EMP where salary less than 5001st, it will clear the dataset that is excluding the, bring the higher salary.\nAnd again, if you apply maximum of the salary, maximum of salary, excluding higher salary will affect you.', '2021-09-19 15:12:05', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `email`, `password`, `api_key`, `regdate`) VALUES
(2, 'Esanov', 'hello@lifepc.uz', '12345678', '2598ab4088d2', '2021-08-29 21:49:01'),
(5, 'Esanov Otabek', 'esanov_otabek_olimjon_ogli@mail.ru', '123456', 'c13c3466f944', '2021-08-29 22:05:00'),
(6, 'Esanov Otabek', 'admiin@gmail.com', '12345678', '5b74ac252557', '2021-09-18 13:42:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `api_key` (`api_key`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;