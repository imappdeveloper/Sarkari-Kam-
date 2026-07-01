import { useQuery } from 'react-query';
import { useDispatch, useSelector } from 'react-redux';
import { RootState } from '../store';
import authService from '../services/authService';
import { loginSuccess, logout } from '../store/authSlice';

export const useAuth = () => {
  const dispatch = useDispatch();
  const auth = useSelector((state: RootState) => state.auth);

  const loginMutation = async (email: string, password: string) => {
    try {
      const response = await authService.login({ email, password });
      const roles = response.user?.roles || [];
      const permissions = response.user?.permissions || [];

      dispatch(
        loginSuccess({
          user: response.user,
          token: response.access_token,
          refreshToken: response.refresh_token,
          roles,
          permissions,
        })
      );

      return response;
    } catch (error) {
      throw error;
    }
  };

  const logoutMutation = async () => {
    try {
      await authService.logout();
      dispatch(logout());
    } catch (error) {
      dispatch(logout());
      throw error;
    }
  };

  return {
    ...auth,
    login: loginMutation,
    logout: logoutMutation,
  };
};
