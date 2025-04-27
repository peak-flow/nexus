# NexusMind

A comprehensive integrated system combining task management, project planning, and knowledge management with AI-powered assistance.

## Overview

NexusMind is a modular monolithic application that brings together three powerful productivity tools:

1. **Task Manager** - Break down complex tasks into manageable micro-tasks with AI assistance
2. **Project Manager** - Plan and track projects with AI-powered suggestions and insights
3. **Second Brain** - Store and retrieve knowledge with semantic search capabilities

All three systems are built on a unified node-based architecture that allows for hierarchical organization with parent-child relationships across all content types.

## Tech Stack

- **Backend Framework**: Laravel
- **Database**: PostgreSQL
  - Traditional relational data storage
  - pgvector extension for vector embeddings and semantic search
- **AI Integration**: Custom AI agents for each module, editable by users
- **Authentication**: Laravel Sanctum
- **API**: RESTful API with OpenAPI specification

## Key Features

### Core System
- Node-based architecture with parent-child relationships
- Unified tagging and categorization
- Cross-module search and relationships
- User-customizable AI agent configurations

### Task Manager
- AI-powered task breakdown (converts big tasks into actionable micro-tasks)
- Priority and dependency management
- Time tracking and estimation
- Integration with calendar systems

### Project Manager
- Goal setting and tracking
- Resource allocation
- Timeline visualization
- AI assistance for project planning and risk assessment

### Second Brain
- Note-taking with rich text support
- Semantic search using vector embeddings
- RAG (Retrieval-Augmented Generation) for AI-enhanced knowledge retrieval
- Knowledge graph visualization

## System Architecture

NexusMind follows a domain-driven design with clear module boundaries:

```
app/
  Domains/
    TaskManagement/
    ProjectManagement/
    KnowledgeManagement/
  Shared/
    NodeSystem/
    AI/
    Search/
    User/
```

### Database Schema

The core of the system is built around a unified node architecture:

- `nodes` - Base table for all content entities
- `node_relationships` - Tracks parent-child and other relationships between nodes
- `node_metadata` - Stores additional properties for flexibility
- `embeddings` - Stores vector representations for semantic search
- `ai_agents` - Configurations for customizable AI agents
- `ai_agent_executions` - Log of AI agent activities

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- PostgreSQL 15+ with pgvector extension
- Node.js and NPM
- API keys for your preferred AI providers

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/nexusmind.git
   cd nexusmind
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install JavaScript dependencies
   ```bash
   npm install
   ```

4. Copy environment file and configure
   ```bash
   cp .env.example .env
   # Edit .env with your database and AI API credentials
   ```

5. Generate application key
   ```bash
   php artisan key:generate
   ```

6. Run database migrations
   ```bash
   php artisan migrate
   ```

7. Compile assets
   ```bash
   npm run dev
   ```

8. Start the development server
   ```bash
   php artisan serve
   ```

## AI Agent Configuration

NexusMind allows users to customize the behavior of AI agents for each module. This can be managed through the UI or by editing configuration files:

- Task Manager Agent - Customizes how tasks are broken down and prioritized
- Project Manager Agent - Controls project planning assistance and recommendations
- Second Brain Agent - Configures knowledge retrieval and suggestion behavior

### Sample Agent Configuration

```php
return [
    'task_agent' => [
        'model' => 'gpt-4',
        'temperature' => 0.3,
        'task_breakdown_depth' => 3,
        'include_time_estimates' => true,
        'user_customizable_fields' => [
            'model',
            'task_breakdown_depth',
            'include_time_estimates'
        ]
    ]
];
```

## API Documentation

NexusMind provides a comprehensive API for integration with other tools:

- `GET /api/nodes` - List all nodes (filterable by type)
- `POST /api/nodes` - Create a new node
- `GET /api/nodes/{id}` - Get a specific node
- `PUT /api/nodes/{id}` - Update a node
- `DELETE /api/nodes/{id}` - Delete a node
- `POST /api/ai/analyze-task` - Submit a task for AI breakdown
- `GET /api/search?q={query}` - Search across all modules

Full API documentation is available at `/api/documentation`.

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgements

- Laravel Team
- pgvector contributors
- AI service providers
