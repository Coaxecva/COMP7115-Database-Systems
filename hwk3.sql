#DROP DATABASE qmtran;
CREATE DATABASE qmtran;

USE qmtran;

CREATE TABLE Contributors
(
    ContributorID INTEGER,
    FirstName VARCHAR(10),
    MiddleInitial CHAR(1),
    LastName VARCHAR(10),
    City VARCHAR(10),
    STATE VARCHAR(10),
    ZIP VARCHAR(10),
    Email VARCHAR(10),
    Phone1 VARCHAR(10),
    Phone2 VARCHAR(10),
    rating SMALLINT,
    PRIMARY KEY (ContributorID)
);

CREATE TABLE Employees
(
    EmployeeID INTEGER,
    FirstName VARCHAR(20),
    MiddleInitial CHAR(1),
    LastName VARCHAR(10),
    City VARCHAR(10),
    STATE VARCHAR(10),
    ZIP VARCHAR(10),
    Email VARCHAR(10),
    Phone1 VARCHAR(10),
    Phone2 VARCHAR(10),
    Salary INTEGER,
    PRIMARY KEY (EmployeeID)
);

CREATE TABLE Approvers
(
    ApproverID INTEGER,
    EmployeeID INTEGER,
    ApproverSince DATE,
    PRIMARY KEY (ApproverID),
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

CREATE TABLE NewsEvent
(
    NewsID INTEGER,
    ShortName VARCHAR(10),
    LongName VARCHAR(10),
    SourceURL CHAR(10),
    Comments CHAR(10),
    ContributorID INTEGER,
    SubmissionDate DATE, 
    ApproverID INTEGER,
    ApprovalDate DATE,
    PublishDate DATE,
    ExpiresDate DATE,
    PRIMARY KEY (NewsID),
    FOREIGN KEY (ContributorID) REFERENCES Contributors(ContributorID),
    FOREIGN KEY (ApproverID) REFERENCES Approvers(ApproverID)
);

INSERT INTO Contributors VALUES (1, 'Scott', 'D', 'Fleming', 'Memphis', 'Tennessee', '38152', 'sdf@memphis.edu', '9016783142', '9016783142', 1);
INSERT INTO Contributors VALUES (2, 'Max', 'H', 'Garzon', 'Memphis', 'Tennessee', '38152', 'mgarzon@memphis.edu', '9016783136', '9016783136', 2);
INSERT INTO Contributors VALUES (3, 'Timothy', 'W', 'Hnat', 'Memphis', 'Tennessee', '38152', 'twhnat@memphis.edu', '9016782986', '9016782986', 3);
INSERT INTO Contributors VALUES (4, 'Vinhthuy', 'T', 'Phan', 'Memphis', 'Tennessee', '38152', 'vphan@memphis.edu', '9016781535', '9016781535', 4);
INSERT INTO Contributors VALUES (5, 'Frederick', 'T', 'Sheldon', 'Memphis', 'Tennessee', '38152', 'ftshldon@memphis.edu', '9016781643', '9016781643', 5);
INSERT INTO Contributors VALUES (6, 'Chase', 'Q', 'Wu', 'Memphis', 'Tennessee', '38152', 'qishiwu@memphis.edu', '9016781539', '9016781539', 6);
INSERT INTO Contributors VALUES (7, 'Sajjan', 'G', 'Shiva', 'Memphis', 'Tennessee', '38152', 'sshiva@memphis.edu', '9016785465', '9016785465', 7);
INSERT INTO Contributors VALUES (8, 'Vasile', '', 'Rus', 'Memphis', 'Tennessee', '38152', 'vrus@memphis.edu', '9016785259', '9016785259', 8);
INSERT INTO Contributors VALUES (9, 'Elena', '', 'Strange', 'Memphis', 'Tennessee', '38152', 'estrange@memphis.edu', '9016783139', '9016783139', 9);
INSERT INTO Contributors VALUES (10, 'Lan', '', 'Wang', 'Memphis', 'Tennessee', '38152', 'lanwang@memphis.edu', '9016782727', '9016782727', 10);

INSERT INTO Employees VALUES (1, 'George', '', 'Anastassiou', 'Memphis', 'Tennessee', '38152', 'ganastss@memphis.edu', '9016783144', '9016783144', 1);
INSERT INTO Employees VALUES (2, 'Dale', '', 'Bowman', 'Memphis', 'Tennessee', '38152', 'ddbowman@memphis.edu', '9016781310', '9016781310', 2);
INSERT INTO Employees VALUES (3, 'Irena', '', 'Lasiecka', 'Memphis', 'Tennessee', '38152', 'lasiecka@memphis.edu', '9016780000', '9016780000', 3);
INSERT INTO Employees VALUES (4, 'Roberto', '', 'Triggiani', 'Memphis', 'Tennessee', '38152', 'rtrggani@memphis.edu', '9016781346', '9016781346', 4);
INSERT INTO Employees VALUES (5, 'Seok', '', 'Wong', 'Memphis', 'Tennessee', '38152', 'seokwong@memphis.edu', '9016783137', '9016781643', 5);
INSERT INTO Employees VALUES (6, 'Ben', '', 'McCarty', 'Memphis', 'Tennessee', '38152', 'bmmccrt1@memphis.edu', '9016781326', '9016781326', 6);
INSERT INTO Employees VALUES (7, 'Bentuo', '', 'Zheng', 'Memphis', 'Tennessee', '38152', 'bzheng@memphis.edu', '9016783534', '9016783534', 7);
INSERT INTO Employees VALUES (8, 'Randall', '', 'McCutcheon', 'Memphis', 'Tennessee', '38152', 'rmcctchn@memphis.edu', '9016782693', '9016782693', 8);
INSERT INTO Employees VALUES (9, 'John', '', 'Haddock', 'Memphis', 'Tennessee', '38152', 'jhaddock@memphis.edu', '9016782496', '9016782496', 9);
INSERT INTO Employees VALUES (10, 'David', '', 'Grynkiewicz', 'Memphis', 'Tennessee', '38152', 'djgrynkw@memphis.edu', '9016781140', '9016781140', 10);

INSERT INTO Approvers VALUES (1, 1, CURDATE());
INSERT INTO Approvers VALUES (2, 2, CURDATE());
INSERT INTO Approvers VALUES (3, 3, CURDATE());
INSERT INTO Approvers VALUES (4, 4, CURDATE());
INSERT INTO Approvers VALUES (5, 5, CURDATE());
INSERT INTO Approvers VALUES (6, 6, CURDATE());
INSERT INTO Approvers VALUES (7, 7, CURDATE());
INSERT INTO Approvers VALUES (8, 8, CURDATE());
INSERT INTO Approvers VALUES (9, 9, CURDATE());
INSERT INTO Approvers VALUES (10, 10, CURDATE());

INSERT INTO NewsEvent VALUES (1, 'Jan', 'January', 'cnn.com', 'AAAA', 1, CURDATE(), 1, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (2, 'Feb', 'February', 'cnn.com', 'BBBB', 2, CURDATE(), 2, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (3, 'Mar', 'March', 'cnn.com', 'CCCC', 3, CURDATE(), 3, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (4, 'Apr', 'April', 'cnn.com', 'DDDD', 4, CURDATE(), 4, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (5, 'May', 'May', 'cnn.com', 'EEEE', 5, CURDATE(), 5, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (6, 'Jun', 'June', 'cnn.com', 'FFFF', 6, CURDATE(), 6, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (7, 'Jul', 'July', 'cnn.com', 'GGGG', 7, CURDATE(), 7, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (8, 'Aug', 'August', 'cnn.com', 'EEEE', 8, CURDATE(), 8, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (9, 'Sep', 'September', 'cnn.com', 'FFFF', 9, CURDATE(), 9, CURDATE(),CURDATE(),CURDATE());
INSERT INTO NewsEvent VALUES (10, 'Oct', 'October', 'cnn.com', 'HHHHH', 10, CURDATE(), 10, CURDATE(),CURDATE(),CURDATE());

CREATE VIEW Current_Employees_Data AS
SELECT EmployeeID, FirstName, MiddleInitial, LastName, Email, Salary
FROM Employees;

#SELECT * FROM Current_Employees_Data;

DESCRIBE NewsEvent;
DESCRIBE Contributors;
DESCRIBE Employees;
DESCRIBE Approvers;

SELECT COUNT(*) FROM NewsEvent;
SELECT COUNT(*) FROM Contributors;
SELECT COUNT(*) FROM Employees;
SELECT COUNT(*) FROM Approvers;
