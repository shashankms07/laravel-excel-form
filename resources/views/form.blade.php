<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
        }

        @media (min-width: 992px) {
            .form-wrapper {
                flex-direction: row;
                align-items: flex-start;
            }
        }

        .info-panel {
            flex: 1;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .form-box {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .form-box:hover {
            transform: translateY(-5px);
        }

        h3 {
            color: #2c3e50;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        h3:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #28a745, #20c997);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        input {
            width: 100%;
            padding: 16px 20px;
            padding-left: 50px;
            border: 2px solid #eef2f7;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        input:focus {
            outline: none;
            border-color: #28a745;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            pointer-events: none;
        }

        button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .success-message {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 1px solid #10b981;
            color: #065f46;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.5s ease;
        }

        .success-icon {
            font-size: 24px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-list {
            list-style: none;
            margin-top: 30px;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            color: #475569;
            font-size: 16px;
        }

        .feature-icon {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h1 {
            color: #fff;
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .logo p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-box {
                padding: 30px 20px;
                margin: 0 10px;
            }
            
            h3 {
                font-size: 24px;
            }
            
            input {
                padding: 14px 20px;
                padding-left: 50px;
            }
            
            button {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .form-box {
                padding: 25px 15px;
            }
            
            h3 {
                font-size: 22px;
            }
            
            input {
                padding: 12px 20px;
                padding-left: 50px;
                font-size: 14px;
            }
            
            .input-icon {
                left: 15px;
            }
        }

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Form validation styles */
        input:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #ef4444;
        }

        .required-indicator {
            color: #ef4444;
            margin-left: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Excel Form</h1>
            <p>Secure & Professional Contact Management</p>
        </div>
        
        <div class="form-wrapper">
            <div class="info-panel">
                <h3>Why Choose Our Form?</h3>
                <ul class="feature-list">
                    <li>
                        <div class="feature-icon">✓</div>
                        <span>Secure data handling with encryption</span>
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        <span>Instant Excel integration</span>
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        <span>Mobile responsive design</span>
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        <span>Real-time validation</span>
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        <span>Professional data management</span>
                    </li>
                </ul>
            </div>
            
            <div class="form-box">
                <h3>Contact Form</h3>

                @if(session('success'))
                    <div class="success-message">
                        <div class="success-icon">✓</div>
                        <div>
                            <strong>Success!</strong>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('form.store') }}" id="contactForm">
                    @csrf
                    <div class="form-group">
                        <div class="input-icon">👤</div>
                        <input type="text" 
                               name="name" 
                               placeholder="Full Name" 
                               required
                               pattern="[A-Za-z\s]{2,}"
                               title="Please enter at least 2 characters">
                    </div>
                    
                    <div class="form-group">
                        <div class="input-icon">✉️</div>
                        <input type="email" 
                               name="email" 
                               placeholder="Email Address" 
                               required>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-icon">📱</div>
                        <input type="text" 
                               name="phone" 
                               placeholder="Phone Number" 
                               required
                               pattern="[\d\s\+\-\(\)]{10,}"
                               title="Please enter a valid phone number">
                    </div>
                    
                    <button type="submit" id="submitBtn">
                        <span id="btnText">Submit</span>
                        <div class="loading" id="loading" style="display: none;"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loading = document.getElementById('loading');
            
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                btnText.style.display = 'none';
                loading.style.display = 'inline-block';
            });
            
            // Add input validation feedback
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value) return;
                    
                    if (this.checkValidity()) {
                        this.style.borderColor = '#28a745';
                    } else {
                        this.style.borderColor = '#ef4444';
                    }
                });
                
                input.addEventListener('input', function() {
                    this.style.borderColor = '#eef2f7';
                });
            });
        });
    </script>
</body>
</html>