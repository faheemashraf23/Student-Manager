
# Student Manager

This project has two tables is (`users` ,`books`)

Which are given below:
## All the MySQL Query

#### Table structure for table `users`

```http
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `major` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) 
```
#### Dumping data for table `users`

```http
INSERT INTO `users` (`id`, `name`, `email`, `student_id`, `department`, `major`, `address`) VALUES
(1, 'faheem', 'faheem23@gmail.com', '4375', 'Pharmacy', 'Data Science', 'Ashulia , Dhaka');
```

#### Table structure for table `books`

```http
CREATE TABLE `books` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,  
  `student_id` int(11) NOT NULL,
  `course_code` varchar(250) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `grade` varchar(250) NOT NULL
)
```
#### Dumping data for table `books`

```http
INSERT INTO `books` (`id`,`student_id`, `course_code`, `course_title`, `semester`,`grade`) VALUES
(1,4375, 'CSE331', 'Web Engineering','Fall2025','A+'),
(2,4379, 'CSE332', 'Software Engineering','Fall2025','A');
```















![image](https://github.com/user-attachments/assets/c96733ec-a1d1-4456-b8cc-0ad41d636b68)

![image](https://github.com/user-attachments/assets/aeab63a0-35e4-4aeb-9dfc-e8459c356da3)

![image](https://github.com/user-attachments/assets/a8d27bac-3b0e-491c-a23f-7c0e81ca202d)

![image](https://github.com/user-attachments/assets/e429e902-2b36-4cf5-b226-f2a1fae682ec)





