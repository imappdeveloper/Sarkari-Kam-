import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { useSelector } from 'react-redux';
import { RootState } from '../store';

const Sidebar: React.FC = () => {
  const location = useLocation();
  const { roles } = useSelector((state: RootState) => state.auth);

  const isAdmin = roles.includes('admin');
  const isVendor = roles.includes('vendor');
  const isCustomer = roles.includes('customer');

  const getMenuItems = () => {
    if (isAdmin) {
      return [
        { label: 'Dashboard', path: '/admin/dashboard' },
        { label: 'Users', path: '/admin/users' },
        { label: 'Vendors', path: '/admin/vendors' },
        { label: 'Orders', path: '/admin/orders' },
        { label: 'Analytics', path: '/admin/analytics' },
        { label: 'Settings', path: '/admin/settings' },
      ];
    } else if (isVendor) {
      return [
        { label: 'Dashboard', path: '/vendor/dashboard' },
        { label: 'Services', path: '/vendor/services' },
        { label: 'Proposals', path: '/vendor/proposals' },
        { label: 'Orders', path: '/vendor/orders' },
        { label: 'Wallet', path: '/vendor/wallet' },
      ];
    } else if (isCustomer) {
      return [
        { label: 'Dashboard', path: '/customer/dashboard' },
        { label: 'Services', path: '/customer/services' },
        { label: 'My Orders', path: '/customer/orders' },
        { label: 'Wallet', path: '/customer/wallet' },
      ];
    }
    return [];
  };

  const menuItems = getMenuItems();

  return (
    <aside className="w-64 bg-gray-900 text-white">
      <div className="p-6">
        <h2 className="text-xl font-bold">Sarkari Kam</h2>
      </div>
      <nav className="mt-8">
        {menuItems.map((item) => (
          <Link
            key={item.path}
            to={item.path}
            className={`block px-6 py-3 transition ${
              location.pathname === item.path
                ? 'bg-blue-500 text-white'
                : 'text-gray-300 hover:bg-gray-800'
            }`}
          >
            {item.label}
          </Link>
        ))}
      </nav>
    </aside>
  );
};

export default Sidebar;
