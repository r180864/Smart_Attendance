
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

-- To create Table Admin for CRs
CREATE TABLE ADMIN(id CHAR(7), password VARCHAR(20), active VARCHAR(15));