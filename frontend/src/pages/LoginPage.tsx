import React from 'react';
import LoginForm from '../components/LoginForm';
import { Link } from 'react-router-dom';

const LoginPage: React.FC = () => {
  return (
    <div className="min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
      <div className="bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
        <div className="text-center mb-8">
          <h1 className="text-3xl font-bold text-gray-900">Sarkari Kam</h1>
          <p className="text-gray-600 mt-2">Government Service Platform</p>
        </div>

        <LoginForm />

        <div className="mt-6 text-center text-sm">
          <p className="text-gray-600">
            Don't have an account?{' '}
            <Link to="/register" className="text-blue-600 hover:text-blue-700 font-medium">
              Register here
            </Link>
          </p>
        </div>

        <div className="mt-4 text-center">
          <Link to="/forgot-password" className="text-blue-600 hover:text-blue-700 text-sm font-medium">
            Forgot your password?
          </Link>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;
