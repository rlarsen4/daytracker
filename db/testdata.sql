-- testdata.sql
-------------------------------
-- student_milestone table

-- new student
-- should i move begin_date to this table?

-- student has taken test
INSERT INTO student_milestone (
    student_id, milestone_id, date_completed) 
    VALUES (
        2, 1, "2014-06-12");

-- student has taken test and been screened

INSERT INTO student_milestone (
    student_id, milestone_id, date_completed) 
    VALUES 
    (3, 1, "2014-06-12"),
    (3, 2, "2014-06-12");

-- 
INSERT INTO student_milestone (
    student_id, milestone_id, date_completed) 
    VALUES 
    (3, 1, "2014-06-12"),
    (3, 2, "2014-06-12");

-- see joined table with all student's info.

SELECT s.first_name, s.last_name, s.begin_date, m.milestone_name, sm.date_completed, s.exit_date
FROM student AS s, student_milestone AS sm, milestone AS m
WHERE s.student_id = sm.student_id;