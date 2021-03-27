# Subject 
- id: bigIncrements
- abbr: string
- title: string
- credits: int (default 0)
- department: string (nullable)
- garant_id: Relation to Employee (nullable)
- lecture_hours: int (default 0)
- seminar_hours: int (default 0)
- exercise_hours: int (default 0)
- weeks: int (default 14)
- language: enum [cz,en] (default cz)
- completation: enum [credit, graded_credit, exam] (default exam)
- group_size: int (default: 24)
- Relation M:N to Study Group

# Employee
- id: bigIncrements
- name: string
- surname: string
- (computed) fullname
- work_phone: string (nullable)
- secondary_phone: string (nullable)
- work_email: string (nullable)
- secondary_email: string (nullable)
- is_in_phd_study: boolean (default: false)
- employment_ratio: int <0-100> (default 100)
- (computed) work_points: int
- (computed) work_points_eng: int
- Relation 1:N to Work Label

# Study Group
- id: bigIncrements
- abbr: string 
- title: string
- form: enum [full-time, part-time] (default: full-time)
- term: enum [spring, autumn] (default: spring)
- year: int (default: current year)
- students_count: int (default: 0)
- language: enum [cz, en] (default: cz)
- type: enum [bachelor, master] (default: bachelor)
- Relation M:N to Subject

# Work Label
- id: bigIncrements
- type: enum [lecture, seminar, exercise, exam, credit, graded_credit]
- student_count: int
- (computed) hours (through Subject relation) (0 when type is one of [exam, credit, graded_credit])
- (computed) weeks (through Subject relation) (0 when type is one of [exam, credit, graded_credit])
- Relation N:1 to Subject subject_id (nullable)
- Relation N:1 to Study Group study_group_id (nullable) 
- Relation N:1 to Employee employee_id (nullable)
