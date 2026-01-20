<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> مشاريع التخرج</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #121212;
            --grid-color: rgba(255, 0, 0, 0.07 );
            --primary-color: #ff1744;
            --primary-dark: #d50000;
            --text-color: #f5f5f5;
            --text-light: #757575;
            --container-bg: rgba(28, 28, 28, 0.85);
            --container-border: rgba(255, 23, 68, 0.3);
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-color);
            background-color: var(--bg-color);
            background-image:
                linear-gradient(var(--grid-color) 1px, transparent 1px),
                linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
            background-size: 25px 25px;
        }

        .container {
            width: 100%;
            max-width: 650px;
            background-color: var(--container-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 3rem;
            border-radius: 15px;
            border: 1px solid var(--container-border);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.6);
        }

        .animated-item {
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.6s ease-out forwards;
        }
        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .title-container { animation-delay: 0.1s; text-align: center; margin-bottom: 2rem; }
        h1 { font-size: 2.2rem; font-weight: 700; color: #fff; }

        .form-group {
            position: relative;
            margin-bottom: 2rem;
            animation-delay: calc(0.3s + var(--i) * 0.1s);
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            font-size: 1.1rem;
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--text-light);
            border-radius: 6px;
            outline: none;
            position: relative;
            z-index: 1;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .form-label {
            position: absolute;
            top: -12px;
            right: 12px;
            font-size: 0.9rem;
            color: var(--text-light);
            background-color: var(--container-bg);
            padding: 0 5px;
            z-index: 2;
        }

        .form-input:focus {
            border-color: var(--primary-color);
            background-color: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 10px rgba(255, 23, 68, 0.3);
        }

        textarea.form-input { resize: none; min-height: 120px; }

        .btn-container { animation-delay: 0.8s; margin-top: 2.5rem; }
        .btn {
            width: 100%;
            padding: 1rem;
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            background-color: var(--primary-color);
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 20px rgba(255, 23, 68, 0.4);
        }

        .btn:hover:not(:disabled) {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            box-shadow: 0 0 30px rgba(255, 23, 68, 0.6);
            transform: translateY(-3px);
        }

        .btn:disabled { background: #424242; border-color: #424242; cursor: not-allowed; }

        .btn.loading .btn-text, .btn.success .btn-text { display: none; }
        .btn .spinner, .btn .checkmark { display: none; }
        .btn.loading .spinner { display: block; }
        .btn.success .checkmark { display: block; }

        .spinner {
            width: 24px; height: 24px; border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff; border-radius: 50%; animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        .checkmark { font-size: 1.5rem; }

        .alert { padding: 1rem; margin-bottom: 1.5rem; border-radius: 5px; border: 1px solid transparent; }
        .alert-success { background-color: rgba(0, 200, 83, 0.15); color: #00c853; border-color: #00c853; }
        .alert-danger { background-color: rgba(213, 0, 0, 0.15); color: #d50000; border-color: #d50000; }

    </style>
</head>
<body>

    <div class="container">
        <div class="title-container animated-item">
            <h1>تسجيل مشروع تخرج</h1>
            <p style="color: var(--text-light); margin-top: 5px;">المنصة الرسمية لتقديم مشاريع التخرج</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success animated-item" style="animation-delay: 0.2s;">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger animated-item" style="animation-delay: 0.2s;">
                <ul style="list-style-type: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="projectForm" action="{{ route('project.store') }}" method="POST">
            @csrf
            <div class="form-group animated-item" style="--i: 1;">
                <label for="student_id" class="form-label">رقم الطالب</label>
                <input type="text" id="student_id" name="student_id" class="form-input" value="{{ old('student_id') }}" required>
            </div>
            <div class="form-group animated-item" style="--i: 2;">
                <label for="name" class="form-label">اسم الطالب</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
            </div>
            <div class="form-group animated-item" style="--i: 3;">
                <label for="governorate" class="form-label">المحافظة</label>
                <input type="text" id="governorate" name="governorate" class="form-input" value="{{ old('governorate') }}" required>
            </div>
            <div class="form-group animated-item" style="--i: 4;">
                <label for="project_idea" class="form-label">فكرة المشروع</label>
                <input type="text" id="project_idea" name="project_idea" class="form-input" value="{{ old('project_idea') }}" required>
            </div>
            <div class="form-group animated-item" style="--i: 5;">
                <label for="project_details" class="form-label">تفاصيل المشروع</label>
                <textarea id="project_details" name="project_details" class="form-input" required>{{ old('project_details') }}</textarea>
            </div>
            <div class="btn-container animated-item" style="--i: 6;">
                <button type="submit" class="btn" id="submitBtn">
                    <span class="btn-text">تقديم المشروع</span>
                    <div class="spinner"></div>
                    <i class="fas fa-check checkmark"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('projectForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            setTimeout(() => {
                form.submit();
            }, 1500);
        });
    </script>
</body>
</html>
