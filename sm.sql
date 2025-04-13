

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `major` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `student_id`, `department`, `major`, `address`) VALUES
(1, 'faheem', 'faheem23@gmail.com', '4375', 'Pharmacy', 'Data Science', 'Ashulia , Dhaka');


..........................................
CREATE TABLE `books` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,  
  `student_id` int(11) NOT NULL,
  `course_code` varchar(250) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`,`student_id`, `course_code`, `course_title`, `semester`,`grade`) VALUES
(1,4375, 'CSE331', 'Web Engineering','Fall2025','A+'),
(2,4379, 'CSE332', 'Software Engineering','Fall2025','A');
