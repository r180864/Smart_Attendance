
-- To Create Table Attendance
CREATE TABLE ATTENDANCE(id CHAR(7),
                        date DATE,
                        section CHAR(5),
                        SE CHAR(7) DEFAULT NULL,
                        CN CHAR(7) DEFAULT NULL,
                        OS CHAR(7) DEFAULT NULL,
                        OOAD CHAR(7) DEFAULT NULL,
                        MFDS CHAR(7) DEFAULT NULL,
                        ENGLISH_LAb CHAR(7) DEFAULT NULL,
                        SE_LAB CHAR(7) DEFAULT NULL,
                        CN_LAB CHAR(7) DEFAULT NULL,
                        OS_LAB CHAR(7) DEFAULT NULL,
                        address VARCHAR(15) DEFAULT NULL
                       );

CREATE TABLE SE(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE CN(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE OS(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE OOAD(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE MFDS(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE ENGLISH_LAB(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE SE_LAB(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE CN_LAB(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));
CREATE TABLE OS_LAB(sid CHAR(7), status CHAR(7) DEFAULT 'Abscent', address VARCHAR(15) UNIQUE DEFAULT NULL, date DATE, FOREIGN KEY(sid) REFERENCES SEC_B(id), PRIMARY KEY(sid, date));

-- To create Table Admin for CRs
CREATE TABLE ADMIN(id CHAR(7), password VARCHAR(20), active VARCHAR(15));

CREATE TABLE ATTENDANCE()