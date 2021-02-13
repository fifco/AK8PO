# Subject 
- id: bigIncrements
- abbr: string
- title: string
- lecture_hours: int
- seminar_hours: int
- exercise_hours: int
- weeks: int
- language: enum [cz,en]
- completation: enum [credit, graded_credit, exam]
- group_size: int
- Relation M:N to Study Group

# Employee
- id: bigIncrements
- fullname: string
- work_phone: string
- secondary_phone: string
- work_email: string
- secondary_email: string
- is_in_phd_study: boolean
- employment_ratio: int <0-100>
- work_points: int
- work_points_eng: int

# Study Group
- id: bigIncrements
- abbr: string
- title: string
- study_type: enum [full-time, part-time]
- term: enum [spring, autumn]
- year: int
- students_count: int
- language: enum [cz, en]
- type: enum [bachelor, master]
- Relation M:N to Subject

# Work Label
- id: bigIncrements
- type: enum [lecture, seminar, exercise, exam, credit, graded_credit]
- Relation N:1 to Subject
- Relation N:1 to Study Group 
- Nullable Relation N:1 to Employee