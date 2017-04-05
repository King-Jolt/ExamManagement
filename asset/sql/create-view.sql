/* list_category */

CREATE VIEW category_table
AS
	SELECT category.*, user.course_id FROM category
	JOIN user ON user.id = category.user_id
	JOIN course ON course.id = user.course_id

CREATE VIEW question_group_table
AS
SELECT question_group.*, exam.category_id, category.user_id, user.course_id FROM question_group
JOIN exam ON exam.id = question_group.exam_id
JOIN category ON category.id = exam.category_id
JOIN user ON user.id = category.user_id
JOIN course ON course.id = user.course_id

CREATE VIEW exam_table
AS
	SELECT exam.*, category.user_id, user.course_id FROM exam
	JOIN category ON category.id = exam.category_id
	JOIN user ON user.id = category.user_id
	JOIN course ON course.id = user.course_id

CREATE VIEW list_category_with_exam
AS
	SELECT category.id, COUNT(exam.id) AS 'n_exam', COUNT(IF(exam.share = category.user_id, exam.share, NULL)) AS 'n_share' FROM category
	LEFT JOIN exam ON exam.category_id = category.id
	GROUP BY category.id

CREATE VIEW list_category
AS
	SELECT category.*, user.course_id, COUNT(a.id) AS 'child', list_category_with_exam.n_exam, list_category_with_exam.n_share FROM category
	LEFT JOIN category AS a ON a.parent = category.id
	JOIN user ON user.id = category.user_id
	JOIN course ON course.id = user.course_id
	JOIN list_category_with_exam ON list_category_with_exam.id = category.id
	GROUP BY category.id, category.id, category.id

/* end */ 