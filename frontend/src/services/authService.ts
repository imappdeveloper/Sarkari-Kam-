import api from './api';

export interface LoginPayload {
  email: string;
  password: string;
}

export interface RegisterPayload {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
  role: string;
}

export interface LoginResponse {
  user: any;
  access_token: string;
  refresh_token: string;
  expires_in: number;
}

const authService = {
  login: async (payload: LoginPayload): Promise<LoginResponse> => {
    const response = await api.post('/api/v1/auth/login', payload);
    return response.data.data;
  },

  register: async (payload: RegisterPayload): Promise<LoginResponse> => {
    const response = await api.post('/api/v1/auth/register', payload);
    return response.data.data;
  },

  logout: async (): Promise<void> => {
    await api.post('/api/v1/auth/logout');
  },

  refreshToken: async (refreshToken: string): Promise<{ access_token: string; refresh_token: string }> => {
    const response = await api.post('/api/v1/auth/refresh', {
      refresh_token: refreshToken,
    });
    return response.data.data;
  },

  getProfile: async (): Promise<any> => {
    const response = await api.get('/api/v1/auth/profile');
    return response.data.data;
  },

  forgotPassword: async (email: string): Promise<{ message: string }> => {
    const response = await api.post('/api/v1/auth/forgot-password', { email });
    return response.data.data;
  },

  resetPassword: async (email: string, token: string, password: string): Promise<{ message: string }> => {
    const response = await api.post('/api/v1/auth/reset-password', {
      email,
      token,
      password,
      password_confirmation: password,
    });
    return response.data.data;
  },
};

export default authService;
