use gsc;

CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO posts (title, name, password, content)
VALUES
    ('테스트 제목 1', '홍길동', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 1입니다.'),
    ('테스트 제목 2', '김영희', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 2입니다.'),
    ('테스트 제목 3', '이철수', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 3입니다.'),
    ('테스트 제목 4', '박민수', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 4입니다.'),
    ('테스트 제목 5', '최지은', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 5입니다.'),
    ('테스트 제목 6', '강서준', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 6입니다.'),
    ('테스트 제목 7', '윤하늘', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 7입니다.'),
    ('테스트 제목 8', '정수빈', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 8입니다.'),
    ('테스트 제목 9', '오예진', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 9입니다.'),
    ('테스트 제목 10', '한서진', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 10입니다.'),
    ('테스트 제목 11', '김도윤', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 11입니다.'),
    ('테스트 제목 12', '이하늘', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 12입니다.'),
    ('테스트 제목 13', '홍예빈', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 13입니다.'),
    ('테스트 제목 14', '박건우', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 14입니다.'),
    ('테스트 제목 15', '윤재희', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 15입니다.'),
    ('테스트 제목 16', '김하늘', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 16입니다.'),
    ('테스트 제목 17', '이소연', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 17입니다.'),
    ('테스트 제목 18', '정예진', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 18입니다.'),
    ('테스트 제목 19', '장준호', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 19입니다.'),
    ('테스트 제목 20', '서하늘', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 20입니다.'),
    ('테스트 제목 21', '김민정', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 21입니다.'),
    ('테스트 제목 22', '박지우', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 22입니다.'),
    ('테스트 제목 23', '최은서', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 23입니다.'),
    ('테스트 제목 24', '이재훈', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 24입니다.'),
    ('테스트 제목 25', '김다은', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 25입니다.'),
    ('테스트 제목 26', '정민지', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 26입니다.'),
    ('테스트 제목 27', '한지원', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 27입니다.'),
    ('테스트 제목 28', '박채원', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 28입니다.'),
    ('테스트 제목 29', '윤도현', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 29입니다.'),
    ('테스트 제목 30', '이윤호', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 30입니다.'),
    ('테스트 제목 31', '최민규', '$2y$10$USCrgB8FMRcAyVnz8dXgFuew5FWOKG.anoSXjrVNxqeOX7U/fMBu2', '내용 31입니다.');

