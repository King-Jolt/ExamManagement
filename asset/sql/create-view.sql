/* list_category */

CREATE VIEW list_category_with_exam
AS
	SELECT category.id, COUNT(exam.id) AS 'n_exam', COUNT(IF(exam.share = category.user_id, exam.share, NULL)) AS 'n_share' FROM category
	LEFT JOIN exam ON exam.category_id = category.id
	GROUP BY category.id

CREATE VIEW list_category
AS
	SELECT category.*, COUNT(a.id) AS 'child', list_category_with_exam.n_exam, list_category_with_exam.n_share FROM category
	LEFT JOIN category AS a ON a.parent = category.id
	JOIN list_category_with_exam ON list_category_with_exam.id = category.id
	GROUP BY category.id, category.id, category.id

/* end */ 