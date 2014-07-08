SELECT s.student_id, s.first_name, s.last_name, sm.date_completed, m.milestone_name
FROM student as s, student_milestone as sm, milestone as m
WHERE s.student_id = sm.student_id
AND sm.milestone_id = m.milestone_id;

SELECT s.student_id, s.first_name, s.last_name, sm.date_completed, m.milestone_name
FROM student as s, student_milestone as sm, milestone as m
WHERE s.student_id = sm.student_id
AND sm.milestone_id = m.milestone_id
AND sm.date_completed = null;

SELECT * 
FROM milestone, student_milestone;
WHERE

